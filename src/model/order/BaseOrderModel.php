<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

abstract class BaseOrderModel {

    protected const SERIAL_VERSION_UID = 3680499668585578069;

    /**
     * @Required
     * @var string
     */
    protected string $sequenceId;

    /**
     * @Required
     * @var string
     */
    protected string $otaOrderId;

    /**
     * @Required
     * @var string
     */
    protected string $supplierOrderId;

    public function getSequenceId(): ?string {
        return $this->sequenceId;
    }

    public function setSequenceId(string $sequenceId): self {
        $this->sequenceId = $sequenceId;
        return $this;
    }

    public function getOtaOrderId(): ?string {
        return $this->otaOrderId;
    }

    public function setOtaOrderId(string $otaOrderId): self {
        $this->otaOrderId = $otaOrderId;
        return $this;
    }

    public function getSupplierOrderId(): ?string {
        return $this->supplierOrderId;
    }

    public function setSupplierOrderId(string $supplierOrderId): self {
        $this->supplierOrderId = $supplierOrderId;
        return $this;
    }

    public function getSerialVersionUid(): int {
        return self::SERIAL_VERSION_UID;
    }
}