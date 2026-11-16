<?php

namespace com\trip\tourop\model\order;

class CancelOrderConfirmModelItem
{
    /**
     * @Required
     * @var string
     */
    private $itemId;

    /**
     * @var CancelOrderVoucher[]
     */
    private $vouchers = [];

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(string $itemId): self
    {
        $this->itemId = $itemId;
        return $this;
    }

    public function getVouchers(): array
    {
        return $this->vouchers;
    }

    public function setVouchers(array $vouchers): self
    {
        $this->vouchers = $vouchers;
        return $this;
    }
}