<?php

namespace com\trip\tourop\model\pkg;

class OptionBrief {
    /**
     * One of: Option, Time_Slot.
     * This code should be setup in the octo/syncProduct endpoint(optionCode field) first.
     * @var string|null
     */
    private ?string $optionCode;

    /**
     * Option value code
     * @var string|null
     */
    private ?string $valueCode;

    /**
     * Option value name,Content language should be the same with primary language.
     * @var string|null
     */
    private ?string $valueName;

    public function getOptionCode(): ?string {
        return $this->optionCode;
    }

    public function setOptionCode(?string $optionCode): self {
        $this->optionCode = $optionCode;
        return $this;
    }

    public function getValueCode(): ?string {
        return $this->valueCode;
    }

    public function setValueCode(?string $valueCode): self {
        $this->valueCode = $valueCode;
        return $this;
    }

    public function getValueName(): ?string {
        return $this->valueName;
    }

    public function setValueName(?string $valueName): self {
        $this->valueName = $valueName;
        return $this;
    }
}