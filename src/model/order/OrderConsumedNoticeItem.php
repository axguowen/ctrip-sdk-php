<?php

namespace com\trip\tourop\model\order;

use Brick\Math\BigDecimal;
use com\trip\tourop\util\Required;

class OrderConsumedNoticeItem {
    /**
     * @var string|null
     */
    private ?string $itemId;

    /**
     * @var string|null
     */
    private ?string $useStartDate;

    /**
     * @var string|null
     */
    private ?string $useEndDate;

    /**
     * @var int|null
     */
    private ?int $quantity;

    /**
     * @Required
     * @var int
     */
    private int $useQuantity;

    /**
     * @var Passenger[]
     */
    private array $passengers = [];

    /**
     * @var OrderConsumedNoticeItemVoucher[]
     */
    private array $vouchers = [];

    /**
     * @var string|null
     */
    private ?string $remark;

    /**
     * @var Discount|null
     */
    private ?Discount $discount;

    /**
     * @var string|null
     */
    private ?BigDecimal $lostAmount;

    /**
     * @var string|null
     */
    private ?string $lostAmountCurrency;

    public function getItemId(): ?string {
        return $this->itemId;
    }

    public function setItemId(?string $itemId): self {
        $this->itemId = $itemId;
        return $this;
    }

    public function getUseStartDate(): ?string {
        return $this->useStartDate;
    }

    public function setUseStartDate(?string $useStartDate): self {
        $this->useStartDate = $useStartDate;
        return $this;
    }

    public function getUseEndDate(): ?string {
        return $this->useEndDate;
    }

    public function setUseEndDate(?string $useEndDate): self {
        $this->useEndDate = $useEndDate;
        return $this;
    }

    public function getQuantity(): ?int {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self {
        $this->quantity = $quantity;
        return $this;
    }

    public function getUseQuantity(): ?int {
        return $this->useQuantity;
    }

    public function setUseQuantity(int $useQuantity): self {
        $this->useQuantity = $useQuantity;
        return $this;
    }

    public function getPassengers(): array {
        return $this->passengers;
    }

    public function setPassengers(array $passengers): self {
        $this->passengers = $passengers;
        return $this;
    }

    public function getVouchers(): array {
        return $this->vouchers;
    }

    public function setVouchers(array $vouchers): self {
        $this->vouchers = $vouchers;
        return $this;
    }

    public function getRemark(): ?string {
        return $this->remark;
    }

    public function setRemark(?string $remark): self {
        $this->remark = $remark;
        return $this;
    }

    public function getDiscount(): ?Discount {
        return $this->discount;
    }

    public function setDiscount(?Discount $discount): self {
        $this->discount = $discount;
        return $this;
    }

    public function getLostAmount(): ?BigDecimal {
        return $this->lostAmount;
    }

    public function setLostAmount(?BigDecimal $lostAmount): self {
        $this->lostAmount = $lostAmount;
        return $this;
    }

    public function getLostAmountCurrency(): ?string {
        return $this->lostAmountCurrency;
    }

    public function setLostAmountCurrency(?string $lostAmountCurrency): self {
        $this->lostAmountCurrency = $lostAmountCurrency;
        return $this;
    }
}

