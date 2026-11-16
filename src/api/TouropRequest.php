<?php

namespace com\trip\tourop\api;

use com\trip\tourop\util\Constants;

class TouropRequest {
    /**
     * @var mixed
     */
    protected mixed $bizModel;

    /**
     * @var string|null
     */
    private ?string $endPoint;

    /**
     * @var string|null
     */
    private ?string $serviceName;

    /**
     * @var string
     */
    private string $version = "1.0";

    /**
     * @var string
     */
    private string $httpMethod = Constants::METHOD_POST;

    public function __construct() {

    }

    public static function ofModel($model, string $endPoint): self {
        $request = new static();
        $request->setBizModel($model);
        $request->setEndPoint($endPoint);
        return $request;
    }

    public function getServiceName(): ?string {
        return $this->serviceName;
    }

    public function setServiceName(string $serviceName): self {
        $this->serviceName = $serviceName;
        return $this;
    }

    public function getVersion(): string {
        return $this->version;
    }

    public function setVersion(string $version): self {
        $this->version = $version;
        return $this;
    }

    public function getEndPoint(): ?string {
        return $this->endPoint;
    }

    public function setEndPoint(string $endPoint): self {
        $this->endPoint = $endPoint;
        return $this;
    }

    public function getBizModel() {
        return $this->bizModel;
    }

    public function setBizModel($bizModel): self {
        $this->bizModel = $bizModel;
        return $this;
    }
}