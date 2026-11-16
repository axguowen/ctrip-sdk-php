<?php

namespace com\trip\tourop\model;

use Brick\Math\BigDecimal;

class Price
{
    /**
     * date, format: yyyy-MM-dd
     */
    private ?string $date;

    /**
     * selling price
     */
    private ?BigDecimal $salePrice;

    /**
     * floor price
     */
    private ?BigDecimal $costPrice;

    public function getCostPrice(): ?BigDecimal
    {
        return $this->costPrice;
    }

    public function setCostPrice(BigDecimal $costPrice): self
    {
        $this->costPrice = $costPrice;
        return $this;
    }

    public function getSalePrice(): ?BigDecimal
    {
        return $this->salePrice;
    }

    public function setSalePrice(BigDecimal $salePrice): self
    {
        $this->salePrice = $salePrice;
        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }
}