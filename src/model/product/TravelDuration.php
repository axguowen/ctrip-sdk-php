<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

/**
 * 旅行时长
 */
class TravelDuration {
    /**
     * Unit of the duration time
     * Enum: "Day" "Hour" "Minute"
     * @Required
     * @var string
     */
    private string $unit;

    /**
     * Value of the duration time
     * @Required
     * @var int
     */
    private int $value;

    public function getUnit(): ?string {
        return $this->unit;
    }

    public function setUnit(string $unit): self {
        $this->unit = $unit;
        return $this;
    }

    public function getValue(): ?int {
        return $this->value;
    }

    public function setValue(int $value): self {
        $this->value = $value;
        return $this;
    }
}