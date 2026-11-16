<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

class BookingSettings {
    /**
     * How long customer need to finish their payment when making an order.
     * The options of Trip.com system are 5, 10, 15, 30, 40, 60, 120 (unit: minute).
     * /

    /**
     * @Required
     * @var int
     */
    private int $paymentConfirmationTime;

    /**
     * @Required
     * @var BookingType
     */
    private BookingType $bookingType;

    public function getPaymentConfirmationTime(): ?int {
        return $this->paymentConfirmationTime;
    }

    public function setPaymentConfirmationTime(int $paymentConfirmationTime): self {
        $this->paymentConfirmationTime = $paymentConfirmationTime;
        return $this;
    }

    public function getBookingType(): ?BookingType {
        return $this->bookingType;
    }

    public function setBookingType(BookingType $bookingType): self {
        $this->bookingType = $bookingType;
        return $this;
    }
}

