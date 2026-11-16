<?php

namespace com\trip\tourop\model\order;

class ExpressDelivery
{
    /**
     * @Required
     * @var int
     */
    private $deliveryType;

    /**
     * @var string|null
     */
    private $companyCode;

    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $trackingNumber;

    /**
     * @var string|null
     */
    private $goodsName;

    /**
     * @var string|null
     */
    private $goodsQuantity;

    /**
     * @var string|null
     */
    private $sendMessage;

    /**
     * @var string|null
     */
    private $receiveMessage;

    public function getDeliveryType(): ?int
    {
        return $this->deliveryType;
    }

    public function setDeliveryType(int $deliveryType): self
    {
        $this->deliveryType = $deliveryType;
        return $this;
    }

    public function getCompanyCode(): ?string
    {
        return $this->companyCode;
    }

    public function setCompanyCode(?string $companyCode): self
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    public function getGoodsName(): ?string
    {
        return $this->goodsName;
    }

    public function setGoodsName(?string $goodsName): self
    {
        $this->goodsName = $goodsName;
        return $this;
    }

    public function getGoodsQuantity(): ?string
    {
        return $this->goodsQuantity;
    }

    public function setGoodsQuantity(?string $goodsQuantity): self
    {
        $this->goodsQuantity = $goodsQuantity;
        return $this;
    }

    public function getSendMessage(): ?string
    {
        return $this->sendMessage;
    }

    public function setSendMessage(?string $sendMessage): self
    {
        $this->sendMessage = $sendMessage;
        return $this;
    }

    public function getReceiveMessage(): ?string
    {
        return $this->receiveMessage;
    }

    public function setReceiveMessage(?string $receiveMessage): self
    {
        $this->receiveMessage = $receiveMessage;
        return $this;
    }
}