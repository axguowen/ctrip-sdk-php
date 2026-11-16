<?php

namespace com\trip\tourop\model\product;

class TravelLocation {
    /**
     * Supplier POI.
     * @var LocationPoint
     */
    private LocationPoint $supplierPOI;

    /**
     * Google place id.
     * @var string
     */
    private string $googlePlaceId;

    public function getSupplierPOI(): ?LocationPoint {
        return $this->supplierPOI;
    }

    public function setSupplierPOI(LocationPoint $supplierPOI): self {
        $this->supplierPOI = $supplierPOI;
        return $this;
    }

    public function getGooglePlaceId(): ?string {
        return $this->googlePlaceId;
    }

    public function setGooglePlaceId(string $googlePlaceId): self {
        $this->googlePlaceId = $googlePlaceId;
        return $this;
    }
}