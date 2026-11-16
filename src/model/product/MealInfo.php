<?php

namespace com\trip\tourop\model\product;

class MealInfo
{
    /**
     * @var string|null
     */
    private ?string $time;

    /**
     * @var TravelLocation|null
     */
    private ?TravelLocation $location;

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
    private ?string $mealType;

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

    public function setLocation(?TravelLocation $location): self
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

    public function getMealType(): ?string
    {
        return $this->mealType;
    }

    public function setMealType(?string $mealType): self
    {
        $this->mealType = $mealType;
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