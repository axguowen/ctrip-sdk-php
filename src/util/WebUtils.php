<?php

namespace com\trip\tourop\util;

class WebUtils {

    private const DEFAULT_CHARSET = Constants::CHARSET_UTF8;
    private static bool $ignoreSSLCheck = true; // ignore SSL check when establish connection
    private static bool $ignoreHostCheck = true; // ignore HOST check when establish connection

    private function __construct() {
        // Private constructor to prevent instantiation.
    }

    public static function setIgnoreSSLCheck(bool $ignoreSSLCheck): void {
        self::$ignoreSSLCheck = $ignoreSSLCheck;
    }

    public static function setIgnoreHostCheck(bool $ignoreHostCheck): void {
        self::$ignoreHostCheck = $ignoreHostCheck;
    }

    /**
     * Do HTTP POST request with query and header parameters.
     */
    public static function doPost(string $url, string $content, array $headers, int $connectTimeout, int $readTimeout, ?array $proxy = null): string {
        $ch = null;

        try {
            $ch = self::getConnection($url, 'POST', $headers, $proxy);

            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $connectTimeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, $readTimeout);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

            return self::getResponseAsString($ch);

        } finally {
            if ($ch !== null) {
                curl_close($ch);
            }
        }
    }

    private static function getConnection(string $url, string $method, array $headers, ?array $proxy = null) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POST, $method === Constants::METHOD_POST);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        }

        if (str_starts_with($url, 'https://')) {
            if (self::$ignoreSSLCheck) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            } else {
                if (self::$ignoreHostCheck) {
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                }
            }
        }

        if ($proxy !== null) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy['host']);
            curl_setopt($ch, CURLOPT_PROXYPORT, $proxy['port']);
            if (isset($proxy['type'])) {
                curl_setopt($ch, CURLOPT_PROXYTYPE, $proxy['type']);
            }
        }

        $requestHeaders = [
            'Host: ' . parse_url($url, PHP_URL_HOST),
            'Accept: application/json',
            'User-Agent: ' . Constants::SDK_VERSION
        ];

        if ($headers !== null) {
            foreach ($headers as $key => $value) {
                if (is_array($value)) {
                    $value = implode(', ', $value);
                } elseif (!is_string($value)) {
                    $value = (string) $value;
                }
                $requestHeaders[] = $key . ': ' . $value;
            }
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);

        return $ch;
    }

    /**
     * @throws \Exception
     */
    protected static function getResponseAsString($ch): string {
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        if ($response === false) {
            throw new \Exception('cURL error: ' . curl_error($ch));
        }

        $charset = self::getResponseCharset($contentType);

        if ($httpCode < 400) {
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers = substr($response, 0, $headerSize);
            $body = substr($response, $headerSize);

            if (preg_match('/Content-Encoding:\s*(.*?)(?:\r?\n|$)/i', $headers, $matches)) {
                $contentEncoding = trim($matches[1]);
                if (strcasecmp($contentEncoding, Constants::CONTENT_ENCODING_GZIP) === 0) {
                    $body = gzdecode($body);
                }
            }

            return $body;
        } else {
            // OAuth bad request always return 400 status
            if ($httpCode == 400) {
                return $response;
            }
            // Client Error 4xx and Server Error 5xx
            throw new \Exception($httpCode . ' ' . $response);
        }
    }

    public static function getResponseCharset(string $contentType): string {
        $charset = self::DEFAULT_CHARSET;

        if (!TouropUtils::isBlank($contentType)) {
            $params = explode(';', $contentType);
            foreach ($params as $param) {
                $param = trim($param);
                if (str_starts_with($param, 'charset')) {
                    $pair = explode('=', $param, 2);
                    if (count($pair) == 2) {
                        if (!TouropUtils::isBlank($pair[1])) {
                            $charset = trim($pair[1]);
                        }
                    }
                    break;
                }
            }
        }

        return $charset;
    }

    public static function getStreamAsString($stream, string $charset): string {
        try {
            $response = '';
            while (!feof($stream)) {
                $response .= fread($stream, 1024);
            }
            return $response;
        } finally {
            if (is_resource($stream)) {
                fclose($stream);
            }
        }
    }
}