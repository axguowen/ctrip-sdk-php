<?php

namespace com\trip\tourop\model\order;

class OrderConsumedNoticeItemVoucher
{
    /**
     * @var string|null
     */
    private $voucherId;

    public function getVoucherId(): ?string
    {
        return $this->voucherId;
    }

    public function setVoucherId(?string $voucherId): self
    {
        $this->voucherId = $voucherId;
        return $this;
    }
}