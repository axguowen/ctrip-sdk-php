<?php

namespace com\trip\tourop\model\product;

class Destination
{
    /**
     * @var LocationPoint|null
     */
    private ?LocationPoint $supplierDestination;

    /**
     * @var string|null
     */
    private ?string $googlePlaceId;

    public function getSupplierDestination(): ?LocationPoint
    {
        return $this->supplierDestination;
    }

    public function setSupplierDestination(?LocationPoint $supplierDestination): self
    {
        $this->supplierDestination = $supplierDestination;
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