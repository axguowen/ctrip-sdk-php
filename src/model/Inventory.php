<?php

namespace com\trip\tourop\model;

class Inventory
{

    private ?string $date;

    /**
     * @Required
     * @var int
     */
    private int $quantity;

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}