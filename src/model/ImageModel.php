<?php

namespace com\trip\tourop\model;

use com\trip\tourop\util\Required;

class ImageModel {
    private const SERIAL_VERSION_UID = 7398112237361904357;
    /**
     * @Required
     * @var string
     */
    private string $imageUrl;

    public function getImageUrl(): ?string {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self {
        $this->imageUrl = $imageUrl;
        return $this;
    }
}