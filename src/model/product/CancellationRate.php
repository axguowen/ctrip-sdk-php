<?php

namespace com\trip\tourop\model\product;

class CancellationRate
{
    /**
     * The number of days before the visit date.
     * @Required
     * @var int
     */
    private int $dayBeforeVisitDate;

    /**
     * The time at that day. Time format: HH:mm.
     * @Required
     * @var string
     */
    private string $time;

    /**
     * rate unit. Currently, only support Percentage(%)
     * @Required
     * @var string
     */
    private string $unit;

    /**
     * rate value
     * @Required
     * @var int
     */
    private int $value;

    public function getDayBeforeVisitDate(): ?int
    {
        return $this->dayBeforeVisitDate;
    }

    public function setDayBeforeVisitDate(int $dayBeforeVisitDate): self
    {
        $this->dayBeforeVisitDate = $dayBeforeVisitDate;
        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;
        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;
        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }
}