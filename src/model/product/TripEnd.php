<?php

namespace com\trip\tourop\model\product;

class TripEnd
{

    private ?string $endTime;

    /**
     * @Required
     * @var string
     */
    private string $endType;

    /**
     * @Required
     * @var TravelLocation[]
     */
    private array $location = [];

    private ?TravelDuration $duration;

    private ?string $description;

    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    public function setEndTime(?string $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getEndType(): ?string
    {
        return $this->endType;
    }

    public function setEndType(string $endType): self
    {
        $this->endType = $endType;
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