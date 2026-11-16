<?php

namespace com\trip\tourop\model\product;

class OctoProductModelOption
{
    /**
     * @Required
     * @var string
     */
    private string $optionCode;

    public function getOptionCode(): ?string
    {
        return $this->optionCode;
    }

    public function setOptionCode(string $optionCode): self
    {
        $this->optionCode = $optionCode;
        return $this;
    }
}