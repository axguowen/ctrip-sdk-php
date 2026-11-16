<?php

namespace com\trip\tourop\model\pkg;

/**
 * Octo product package model
 */
class OctoPackageModel {
    private const SERIAL_VERSION_UID = -1603661704612037954;

    /**
     * @var string|null
     */
    private ?string $supplierProductId;

    /**
     * @var Option[]
     */
    private array $optionList = [];

    public function getSupplierProductId(): ?string {
        return $this->supplierProductId;
    }

    public function setSupplierProductId(?string $supplierProductId): self {
        $this->supplierProductId = $supplierProductId;
        return $this;
    }

    public function getOptionList(): array {
        return $this->optionList;
    }

    public function setOptionList(array $optionList): self {
        $this->optionList = $optionList;
        return $this;
    }

    public function getSerialVersionUid(): int {
        return self::SERIAL_VERSION_UID;
    }
}