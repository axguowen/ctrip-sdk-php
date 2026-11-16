<?php

namespace com\trip\tourop\model\product;

class Gallery
{
    /**
     * trip Image ID returned by uploadImage API.
     * @Required
     * @var string
     */
    private string $tripImageId;

    public function getTripImageId(): ?string
    {
        return $this->tripImageId;
    }

    public function setTripImageId(string $tripImageId): self
    {
        $this->tripImageId = $tripImageId;
        return $this;
    }
}