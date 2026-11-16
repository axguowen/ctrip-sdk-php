<?php

namespace com\trip\tourop\api\impl;

use com\trip\tourop\api\TouropRequest;
use com\trip\tourop\api\TouropResponse;
use com\trip\tourop\model\ImageModel;
use com\trip\tourop\model\pkg\OctoPackageModel;
use com\trip\tourop\model\product\OctoProductModel;
use com\trip\tourop\util\AES;
use com\trip\tourop\util\ApiException;
use com\trip\tourop\util\Constants;
use com\trip\tourop\util\TouropHashMap;
use com\trip\tourop\util\TouropLogger;
use com\trip\tourop\util\TouropUtils;
use com\trip\tourop\util\WebUtils;

abstract class TouropAgent {
    protected ?string $accountId;
    protected ?string $signKey;
    protected ?AES $aes;
    protected int $connectTimeout = 60000; // default connection timeout
    protected int $readTimeout = 60000; // default read timeout
    protected bool $useGzipEncoding = false; // use gzip encoding or not
    protected $proxy = null;
    protected string $sdkVersion = Constants::SDK_VERSION;

    protected string $logLevel = Constants::LOG_LEVEL_ERROR;

    protected function __construct(string $accountId, string $aesKey, string $aesVector, string $signKey) {
        $this->accountId = $accountId;
        $this->signKey = $signKey;
        $this->aes = new AES($aesKey, $aesVector);
    }

    /**
     * @throws ApiException
     */
    protected function doSync(TouropRequest $request): TouropResponse {
        $start = microtime(true) * 1000;
//        $modelJson = json_encode($request->getBizModel());
        // 反射获取私有属性
        $bizModel = $request->getBizModel();
        $data = [];
        if (is_object($bizModel)) {
            $reflectionClass = new \ReflectionClass($bizModel);
            $properties = $reflectionClass->getProperties();
            foreach ($properties as $property) {
                $property->setAccessible(true);
                if (!$property->isInitialized($bizModel)) {
                    continue;
                }
                $value = $property->getValue($bizModel);
                if ($value instanceof \Brick\Math\BigDecimal) {
                    $value = (string)$value;
                }
                $data[$property->getName()] = $value;
            }
        } else {
            $data = $bizModel;
        }
        $modelJson = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $httpBody = null;
        $rsp = null;

        $httpHeader = new TouropHashMap();
        $httpHeader->put("Content-Type", "application/json;charset=" . Constants::CHARSET_UTF8);
        $httpHeader->put("User-Agent", Constants::SDK_VERSION);

        try {
            $modelCipher = $this->aes->encrypt($modelJson);

            if ($request->getBizModel() instanceof OctoProductModel ||
                $request->getBizModel() instanceof OctoPackageModel ||
                $request->getBizModel() instanceof ImageModel) {

                $sequenceId = TouropUtils::getSequenceId();

                $httpHeader->put("AccountId", $this->accountId);
                $httpHeader->put("SequenceId", $sequenceId);

                $signData = $this->accountId . $modelCipher . $sequenceId . $this->signKey;
                $sign = TouropUtils::getMD5Signature($signData);
                $httpHeader->put(Constants::AUTHORIZATION, $sign);

                $httpBody = $modelCipher;
            } else {
                $requestTime = TouropUtils::formatDateTime(new \DateTime(), "Y-m-d H:i:s");
                $signData = $this->accountId . $request->getServiceName() . $requestTime . $modelCipher . $request->getVersion() . $this->signKey;
                $sign = TouropUtils::getMD5Signature($signData);

                $headerObject = [
                    Constants::ACCOUNT_ID => $this->accountId,
                    Constants::SERVICE_NAME => $request->getServiceName(),
                    Constants::REQUEST_TIME => $requestTime,
                    Constants::VERSION => $request->getVersion(),
                    Constants::SIGN => $sign
                ];

                $data = [
                    Constants::HEADER => $headerObject,
                    Constants::BODY => $modelCipher
                ];

                $httpBody = json_encode($data);
            }

            if ($this->useGzipEncoding) {
                $httpHeader->put(Constants::ACCEPT_ENCODING, Constants::CONTENT_ENCODING_GZIP);
            }

            $rsp = WebUtils::doPost($request->getEndPoint(), $httpBody, $httpHeader->toArray(), $this->connectTimeout, $this->readTimeout, $this->proxy);

        } catch (\Exception $e) {
            TouropLogger::write($this->accountId, $this->sdkVersion, $request->getServiceName(), $request->getEndPoint(), $modelJson, (microtime(true) * 1000) - $start, $e->getMessage());
            throw new ApiException($e);
        }

        $response = $this->parseResponse($rsp);
        if (!$response->isSuccess()) {
            TouropLogger::write($this->accountId, $this->sdkVersion, $request->getServiceName(), $request->getEndPoint(), $modelJson, (microtime(true) * 1000) - $start, json_encode($response));
        } else {
            if ($this->isDebugEnabled() || $this->isInfoEnabled()) {
                TouropLogger::write($this->accountId, $this->sdkVersion, $request->getServiceName(), $request->getEndPoint(), $modelJson, (microtime(true) * 1000) - $start, json_encode($response));
            }
        }

        return $response;
    }

    private function parseResponse(string $jsonRsp): TouropResponse {
        $response = new TouropResponse();

        if (empty($jsonRsp)) {
            $response->setCode('9999');
            $response->setMessage('Empty response');
            return $response;
        }
        
        $jsonObject = json_decode($jsonRsp, true);

        if (isset($jsonObject[Constants::HEADER])) {
            $header = $jsonObject[Constants::HEADER];
            $code = $header[Constants::RSP_CODE] ?? '9999';
            $message = $header[Constants::RSP_MSG] ?? 'Unknown error';
            $response->setCode($code);
            $response->setMessage($message);
        } else {
            $code = $jsonObject[Constants::RSP_CODE] ?? '9999';
            $message = $jsonObject[Constants::RSP_MSG] ?? 'Unknown error';
            $response->setCode($code);
            $response->setMessage($message);
        }

        return $response;
    }

    /**
     * Enable request logging when error happen.
     */
    public function setNeedEnableLogger(bool $needEnableLogger): void {
        TouropLogger::setNeedEnableLogger($needEnableLogger);
    }

    /**
     * Set this client to ignore SSL certificate verification or not
     */
    public function setIgnoreSSLCheck(bool $ignore): void {
        WebUtils::setIgnoreSSLCheck($ignore);
    }

    /**
     * Set this client to use http gzip encoding or not
     */
    public function setUseGzipEncoding(bool $useGzipEncoding): void {
        $this->useGzipEncoding = $useGzipEncoding;
    }

    /**
     * Set socket connect timeout time, default is 60 seconds.
     */
    public function setConnectTimeout(int $connectTimeout): void {
        $this->connectTimeout = $connectTimeout;
    }

    /**
     * Set socket read timeout time, default is 60 seconds.
     */
    public function setReadTimeout(int $readTimeout): void {
        $this->readTimeout = $readTimeout;
    }

    /**
     * Set request proxy.
     */
    public function setProxy($proxy): void {
        $this->proxy = $proxy;
    }

    public function setLogLevel(string $logLevel): void {
        $this->logLevel = $logLevel;
    }

    public function isDebugEnabled(): bool {
        return $this->logLevel === Constants::LOG_LEVEL_DEBUG;
    }

    public function isInfoEnabled(): bool {
        return $this->logLevel === Constants::LOG_LEVEL_INFO;
    }

    public function isErrorEnabled(): bool {
        return $this->logLevel === Constants::LOG_LEVEL_ERROR;
    }
}
