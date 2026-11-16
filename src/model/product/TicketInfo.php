<?php

namespace com\trip\tourop\model\product;

class TicketInfo
{
    /**
     * @var string|null
     */
    private ?string $deliveryMethods;

    public function getDeliveryMethods(): ?string
    {
        return $this->deliveryMethods;
    }

    public function setDeliveryMethods(?string $deliveryMethods): self
    {
        $this->deliveryMethods = $deliveryMethods;
        return $this;
    }
}