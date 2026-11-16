<?php

namespace com\trip\tourop\model\pkg;

class BookingCutOffTime {
    /**
     * The number of days before the visit date
     * @var string|null
     */
    private ?string $dayBeforeVisitDate;

    /**
     * The time at that day
     * @var string|null
     */
    private ?string $time;

    public function getDayBeforeVisitDate(): ?string {
        return $this->dayBeforeVisitDate;
    }

    public function setDayBeforeVisitDate(?string $dayBeforeVisitDate): self {
        $this->dayBeforeVisitDate = $dayBeforeVisitDate;
        return $this;
    }

    public function getTime(): ?string {
        return $this->time;
    }

    public function setTime(?string $time): self {
        $this->time = $time;
        return $this;
    }
}