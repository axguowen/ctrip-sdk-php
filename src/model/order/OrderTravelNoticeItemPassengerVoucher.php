<?php

namespace com\trip\tourop\model\order;

class OrderTravelNoticeItemPassengerVoucher
{
    /**
     * @Required
     * @var string
     */
    private string $passengerId;

    /**
     * @Required
     * @var string
     */
    private string $voucherId;

    public function getPassengerId(): ?string
    {
        return $this->passengerId;
    }

    public function setPassengerId(string $passengerId): self
    {
        $this->passengerId = $passengerId;
        return $this;
    }

    public function getVoucherId(): ?string
    {
        return $this->voucherId;
    }

    public function setVoucherId(string $voucherId): self
    {
        $this->voucherId = $voucherId;
        return $this;
    }
}