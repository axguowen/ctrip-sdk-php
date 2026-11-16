<?php

namespace com\trip\tourop\model\product;

class Departure
{
    /**
     * @var LocationPoint|null
     */
    private ?LocationPoint $supplierDeparture;

    /**
     * @var string|null
     */
    private ?string $googlePlaceId;

    public function getSupplierDeparture(): ?LocationPoint
    {
        return $this->supplierDeparture;
    }

    public function setSupplierDeparture(?LocationPoint $supplierDeparture): self
    {
        $this->supplierDeparture = $supplierDeparture;
        return $this;
    }

    public function getGooglePlaceId(): ?string
    {
        return $this->googlePlaceId;
    }

    public function setGooglePlaceId(?string $googlePlaceId): self
    {
        $this->googlePlaceId = $googlePlaceId;
        return $this;
    }
}