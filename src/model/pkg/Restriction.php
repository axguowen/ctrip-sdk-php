<?php

namespace com\trip\tourop\model\pkg;

class Restriction
{
    /**
     * @var string|null
     */
    private ?string $minUnits;

    /**
     * @var string|null
     */
    private ?string $maxUnits;

    /**
     * @var string|null
     */
    private ?string $unitPax;

    /**
     * @var string|null
     */
    private ?string $companionRequired;

    public function getMinUnits(): ?string
    {
        return $this->minUnits;
    }

    public function setMinUnits(?string $minUnits): self
    {
        $this->minUnits = $minUnits;
        return $this;
    }

    public function getMaxUnits(): ?string
    {
        return $this->maxUnits;
    }

    public function setMaxUnits(?string $maxUnits): self
    {
        $this->maxUnits = $maxUnits;
        return $this;
    }

    public function getUnitPax(): ?string
    {
        return $this->unitPax;
    }

    public function setUnitPax(?string $unitPax): self
    {
        $this->unitPax = $unitPax;
        return $this;
    }

    public function getCompanionRequired(): ?string
    {
        return $this->companionRequired;
    }

    public function setCompanionRequired(?string $companionRequired): self
    {
        $this->companionRequired = $companionRequired;
        return $this;
    }
}