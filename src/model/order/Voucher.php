<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class Voucher {
    /**
     * @var string|null
     */
    private ?string $itemId;

    /**
     * @var string|null
     */
    private ?string $voucherId;

    /**
     * @Required
     * @var int
     */
    private int $voucherType;

    /**
     * @var string|null
     */
    private ?string $voucherCode;

    /**
     * @var string|null
     */
    private ?string $voucherData;

    /**
     * @var string|null
     */
    private ?string $voucherSeatInfo;

    public function getItemId(): ?string {
        return $this->itemId;
    }

    public function setItemId(?string $itemId): self {
        $this->itemId = $itemId;
        return $this;
    }

    public function getVoucherId(): ?string {
        return $this->voucherId;
    }

    public function setVoucherId(?string $voucherId): self {
        $this->voucherId = $voucherId;
        return $this;
    }

    public function getVoucherType(): ?int {
        return $this->voucherType;
    }

    public function setVoucherType(int $voucherType): self {
        $this->voucherType = $voucherType;
        return $this;
    }

    public function getVoucherCode(): ?string {
        return $this->voucherCode;
    }

    public function setVoucherCode(?string $voucherCode): self {
        $this->voucherCode = $voucherCode;
        return $this;
    }

    public function getVoucherData(): ?string {
        return $this->voucherData;
    }

    public function setVoucherData(?string $voucherData): self {
        $this->voucherData = $voucherData;
        return $this;
    }

    public function getVoucherSeatInfo(): ?string {
        return $this->voucherSeatInfo;
    }

    public function setVoucherSeatInfo(?string $voucherSeatInfo): self {
        $this->voucherSeatInfo = $voucherSeatInfo;
        return $this;
    }
}