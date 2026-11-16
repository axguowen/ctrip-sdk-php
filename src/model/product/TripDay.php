<?php

namespace com\trip\tourop\model\product;

class TripDay
{

    private ?int $dayNumber;

    /**
     * @Required
     * @var ActivityItemInfo[]
     */
    private array $items = [];

    /**
     * @var MealInfo[]
     */
    private array $food = [];

    /**
     * @var Accommodation|null
     */
    private ?Accommodation $accommodation;

    public function getDayNumber(): ?int
    {
        return $this->dayNumber;
    }

    public function setDayNumber(?int $dayNumber): self
    {
        $this->dayNumber = $dayNumber;
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function getFood(): array
    {
        return $this->food;
    }

    public function setFood(array $food): self
    {
        $this->food = $food;
        return $this;
    }

    public function getAccommodation(): ?Accommodation
    {
        return $this->accommodation;
    }

    public function setAccommodation(?Accommodation $accommodation): self
    {
        $this->accommodation = $accommodation;
        return $this;
    }
}