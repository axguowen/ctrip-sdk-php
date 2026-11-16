<?php

namespace com\trip\tourop\model\product;

class RedemptionLocation
{
    /**
     * @var LocationPoint|null
     */
    private ?LocationPoint $supplierLocation;

    /**
     * @var string|null
     */
    private ?string $googlePlaceId;

    public function getSupplierLocation(): ?LocationPoint
    {
        return $this->supplierLocation;
    }

    public function setSupplierLocation(?LocationPoint $supplierLocation): self
    {
        $this->supplierLocation = $supplierLocation;
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