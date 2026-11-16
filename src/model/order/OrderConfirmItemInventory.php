<?php

namespace com\trip\tourop\model\order;

class OrderConfirmItemInventory
{
    /**
     * @Required
     * @var string
     */
    private $useDate;

    /**
     * @Required
     * @var int
     */
    private $quantity;

    public function getUseDate(): ?string
    {
        return $this->useDate;
    }

    public function setUseDate(string $useDate): self
    {
        $this->useDate = $useDate;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}