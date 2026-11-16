<?php

namespace com\trip\tourop\model\pkg;

class Option {
    /**
     * @var OptionBrief[]
     */
    private array $option = [];

    /**
     * @var string|null
     */
    private ?string $optionStatus;

    /**
     * @var string|null
     */
    private ?string $optionDescription;

    /**
     * @var BookingCutOffTime|null
     */
    private ?BookingCutOffTime $bookingCutOffTime;

    /**
     * Booking questions that customers need to fill out when making an order.
     * @var BookingQuestion[]
     */
    private array $bookingQuestions = [];

    /**
     * Product unit object
     * @var OptionUnit[]
     */
    private array $unit = [];

    public function getOptionBriefList(): array {
        return $this->option;
    }

    public function setOptionBriefList(array $optionBriefList): self {
        $this->option = $optionBriefList;
        return $this;
    }

    public function getOptionStatus(): ?string {
        return $this->optionStatus;
    }

    public function setOptionStatus(?string $optionStatus): self {
        $this->optionStatus = $optionStatus;
        return $this;
    }

    public function getOptionDescription(): ?string {
        return $this->optionDescription;
    }

    public function setOptionDescription(?string $optionDescription): self {
        $this->optionDescription = $optionDescription;
        return $this;
    }

    public function getBookingCutOffTime(): ?BookingCutOffTime {
        return $this->bookingCutOffTime;
    }

    public function setBookingCutOffTime(?BookingCutOffTime $bookingCutOffTime): self {
        $this->bookingCutOffTime = $bookingCutOffTime;
        return $this;
    }

    public function getBookingQuestions(): array {
        return $this->bookingQuestions;
    }

    public function setBookingQuestions(array $bookingQuestions): self {
        $this->bookingQuestions = $bookingQuestions;
        return $this;
    }

    public function getUnitList(): array {
        return $this->unit;
    }

    public function setUnitList(array $unitList): self {
        $this->unit = $unitList;
        return $this;
    }
}