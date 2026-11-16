<?php

namespace com\trip\tourop\model\order;

class Passenger
{
    /**
     * @var string|null
     */
    private $passengerId;

    public function getPassengerId(): ?string
    {
        return $this->passengerId;
    }

    public function setPassengerId(?string $passengerId): self
    {
        $this->passengerId = $passengerId;
        return $this;
    }
}