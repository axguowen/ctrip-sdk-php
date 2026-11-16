<?php

namespace com\trip\tourop\model\product;

/**
 * Location detail information for mapping between supplier and Trip.com systems.
 */
class LocationMappingElement
{
    /**
     * location name
     * @Required
     * @var string
     */
    private string $name;

    /**
     * location address detail
     * @Required
     * @var string
     */
    private string $addressDetail;

    /**
     * location latitude
     * @Required
     * @var string
     */
    private string $latitude;

    /**
     * location longitude
     * @Required
     * @var string
     */
    private string $longitude;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getAddressDetail(): ?string
    {
        return $this->addressDetail;
    }

    public function setAddressDetail(string $addressDetail): self
    {
        $this->addressDetail = $addressDetail;
        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }
}