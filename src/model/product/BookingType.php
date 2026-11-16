<?php

namespace com\trip\tourop\model\product;

class BookingType
{
    /**
     * @Required
     * @var string
     */
    private string $dateType;

    /**
     * @Required
     * @var DateLimit
     */
    private DateLimit $dateLimit;

    public function getDateType(): ?string
    {
        return $this->dateType;
    }

    public function setDateType(string $dateType): self
    {
        $this->dateType = $dateType;
        return $this;
    }

    public function getDateLimit(): ?DateLimit
    {
        return $this->dateLimit;
    }

    public function setDateLimit(DateLimit $dateLimit): self
    {
        $this->dateLimit = $dateLimit;
        return $this;
    }
}