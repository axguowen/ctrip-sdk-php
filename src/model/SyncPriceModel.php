<?php

namespace com\trip\tourop\model;

use com\trip\tourop\util\Required;

class SyncPriceModel {
    private const SERIAL_VERSION_UID = 5022385234997408630;

    /**
     * @Required
     * @var string
     */
    private string $sequenceId;

    private ?int $otaOptionId;

    private ?string $supplierOptionId;

    private ?string $dateType;

    /**
     * @Required
     * @var price[]
     */
    private array $prices = [];

    public function getSupplierOptionId(): ?string {
        return $this->supplierOptionId;
    }

    public function setSupplierOptionId(string $supplierOptionId): self {
        $this->supplierOptionId = $supplierOptionId;
        return $this;
    }

    public function getOtaOptionId(): ?int {
        return $this->otaOptionId;
    }

    public function setOtaOptionId(?int $otaOptionId): self {
        $this->otaOptionId = $otaOptionId;
        return $this;
    }

    public function getSequenceId(): ?string {
        return $this->sequenceId;
    }

    public function setSequenceId(string $sequenceId): self {
        $this->sequenceId = $sequenceId;
        return $this;
    }

    public function getDateType(): ?string {
        return $this->dateType;
    }

    public function setDateType(string $dateType): self {
        $this->dateType = $dateType;
        return $this;
    }

    public function getPrices(): array {
        return $this->prices;
    }

    public function setPrices(array $prices): self {
        $this->prices = $prices;
        return $this;
    }
}