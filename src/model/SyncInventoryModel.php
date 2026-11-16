<?php

namespace com\trip\tourop\model;

use com\trip\tourop\util\Required;

class SyncInventoryModel {
    private const SERIAL_VERSION_UID = -1721637374682151792;

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
     * @var Inventory[]
     */
    private array $inventorys = [];

    public function getSequenceId(): ?string {
        return $this->sequenceId;
    }

    public function setSequenceId(string $sequenceId): self {
        $this->sequenceId = $sequenceId;
        return $this;
    }

    public function getOtaOptionId(): ?int {
        return $this->otaOptionId;
    }

    public function setOtaOptionId(?int $otaOptionId): self {
        $this->otaOptionId = $otaOptionId;
        return $this;
    }

    public function getSupplierOptionId(): ?string {
        return $this->supplierOptionId;
    }

    public function setSupplierOptionId(string $supplierOptionId): self {
        $this->supplierOptionId = $supplierOptionId;
        return $this;
    }

    public function getDateType(): ?string {
        return $this->dateType;
    }

    public function setDateType(string $dateType): self {
        $this->dateType = $dateType;
        return $this;
    }

    public function getInventoryList(): array {
        return $this->inventorys;
    }

    public function setInventoryList(array $inventoryList): self {
        $this->inventorys = $inventoryList;
        return $this;
    }

    public function getSerialVersionUid(): int {
        return self::SERIAL_VERSION_UID;
    }
}
