<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

class CancellationPolicy {
    /**
     * Enum: "Non_Cancellable" "Free_Cancel" "By_Visit_Date"
     * Cancellation type of the product
     * One of: Non_Cancellable, Free_Cancel (Free cancel at any time), By_Visit_Date (Have multiple policies base on the cancel date)
     * @Required
     * @var string
     */
    private string $type;

    /**
     * cancellation rate List (<= 5 items)
     * Only required and valid when cancellation type is By_Visit_Date
     * For example, if the visit date is 10th Apr. and supplier want to set a cancellation rule like:
     * @var CancellationRate[]
     */
    private array $rateList = [];

    /**
     * Cancellation confirmation time
     * How long customer need to wait for the result when cancelling an order.
     * The options of Trip.com system are 8, 16, 24 (unit: hour).
     * @Required
     * @var int
     */
    private int $confirmationTime;

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getRateList(): array {
        return $this->rateList;
    }

    public function setRateList(array $rateList): self {
        $this->rateList = $rateList;
        return $this;
    }

    public function getConfirmationTime(): ?int {
        return $this->confirmationTime;
    }

    public function setConfirmationTime(int $confirmationTime): self {
        $this->confirmationTime = $confirmationTime;
        return $this;
    }
}

