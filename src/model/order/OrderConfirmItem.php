<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class OrderConfirmItem {
    /**
     * @Required
     * @var string
     */
    private string $itemId;

    /**
     * @Required
     * @var int
     */
    private int $isCredentialVouchers;

    /**
     * @var PassengerVoucher[]
     */
    private array $passengerVouchers = [];

    /**
     * @var OrderConfirmItemInventory[]
     */
    private array $inventorys = [];

    public function getItemId(): ?string {
        return $this->itemId;
    }

    public function setItemId(string $itemId): self {
        $this->itemId = $itemId;
        return $this;
    }

    public function getIsCredentialVouchers(): ?int {
        return $this->isCredentialVouchers;
    }

    public function setIsCredentialVouchers(int $isCredentialVouchers): self {
        $this->isCredentialVouchers = $isCredentialVouchers;
        return $this;
    }

    public function getPassengerVouchers(): array {
        return $this->passengerVouchers;
    }

    public function setPassengerVouchers(array $passengerVouchers): self {
        $this->passengerVouchers = $passengerVouchers;
        return $this;
    }

    public function getInventoryList(): array {
        return $this->inventorys;
    }

    public function setInventoryList(array $inventoryList): self {
        $this->inventorys = $inventoryList;
        return $this;
    }
}
