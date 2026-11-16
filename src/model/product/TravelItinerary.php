<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

class TravelItinerary {
    /**
     * Start trip information
     * @Required
     * @var TripStart[]
     */
    private array $start = [];

    /**
     * End trip information
     * @var TripEnd[]
     */
    private array $end = [];

    /**
     * Itinerary information for every day
     * @var TripDay[]
     */
    private array $days = [];

    public function getStart(): array {
        return $this->start;
    }

    public function setStart(array $start): self {
        $this->start = $start;
        return $this;
    }

    public function getEnd(): array {
        return $this->end;
    }

    public function setEnd(array $end): self {
        $this->end = $end;
        return $this;
    }

    public function getDays(): array {
        return $this->days;
    }

    public function setDays(array $days): self {
        $this->days = $days;
        return $this;
    }
}

