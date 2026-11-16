<?php

namespace com\trip\tourop\model\product;

class Language
{
    /**
     * @var string|null
     */
    private ?string $languageCode;

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }
}