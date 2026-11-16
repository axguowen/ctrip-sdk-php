<?php

namespace com\trip\tourop\model\product;

class ActivityItemInfo
{
    /**
     * @var string|null
     */
    private ?string $time;

    /**
     * @Required
     * @var TravelLocation
     */
    private TravelLocation $location;

    /**
     * @var TravelDuration|null
     */
    private ?TravelDuration $duration;

    /**
     * @var string|null
     */
    private ?string $feeInclusions;

    /**
     * @var string|null
     */
    private ?string $visitType;

    /**
     * @var string|null
     */
    private ?string $description;

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;
        return $this;
    }

    public function getLocation(): ?TravelLocation
    {
        return $this->location;
    }

    public function setLocation(TravelLocation $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getDuration(): ?TravelDuration
    {
        return $this->duration;
    }

    public function setDuration(?TravelDuration $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function getFeeInclusions(): ?string
    {
        return $this->feeInclusions;
    }

    public function setFeeInclusions(?string $feeInclusions): self
    {
        $this->feeInclusions = $feeInclusions;
        return $this;
    }

    public function getVisitType(): ?string
    {
        return $this->visitType;
    }

    public function setVisitType(?string $visitType): self
    {
        $this->visitType = $visitType;
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