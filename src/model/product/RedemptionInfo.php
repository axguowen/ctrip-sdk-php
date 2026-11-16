<?php

namespace com\trip\tourop\model\product;

class RedemptionInfo
{
    /**
     * @var string|null
     */
    private ?string $redemptionType;

    /**
     * @var RedemptionLocation|null
     */
    private ?RedemptionLocation $redemptionLocation;

    /**
     * @var string|null
     */
    private ?string $description;

    public function getRedemptionType(): ?string
    {
        return $this->redemptionType;
    }

    public function setRedemptionType(?string $redemptionType): self
    {
        $this->redemptionType = $redemptionType;
        return $this;
    }

    public function getRedemptionLocation(): ?RedemptionLocation
    {
        return $this->redemptionLocation;
    }

    public function setRedemptionLocation(?RedemptionLocation $redemptionLocation): self
    {
        $this->redemptionLocation = $redemptionLocation;
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