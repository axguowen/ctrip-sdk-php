<?php

namespace com\trip\tourop\model\product;

class Accommodation
{
    /**
     * @var TravelLocation|null
     */
    private ?TravelLocation $location;

    /**
     * @var string|null
     */
    private ?string $description;

    public function getLocation(): ?TravelLocation
    {
        return $this->location;
    }

    public function setLocation(?TravelLocation $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}