<?php

namespace com\trip\tourop\model\product;

class TripStart
{

    private ?string $startTime;

    /**
     * @Required
     * @var string
     */
    private string $startType;

    /**
     * @Required
     * @var TravelLocation[]
     */
    private array $location = [];

    private ?TravelDuration $duration;

    private ?string $description;

    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    public function setStartTime(?string $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getStartType(): ?string
    {
        return $this->startType;
    }

    public function setStartType(string $startType): self
    {
        $this->startType = $startType;
        return $this;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $location): self
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