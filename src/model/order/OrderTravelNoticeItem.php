<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class OrderTravelNoticeItem {
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
     * @var OrderTravelNoticeItemPassengerVoucher[]
     */
    private array $vouchers = [];

    /**
     * @var string|null
     */
    private ?string $remark;

    /**
     * @var ExpressDelivery|null
     */
    private ?ExpressDelivery $expressDelivery;

    /**
     * @var TravelInformation[]
     */
    private array $travelInformations = [];

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

    public function getExpressDelivery(): ?ExpressDelivery {
        return $this->expressDelivery;
    }

    public function setExpressDelivery(?ExpressDelivery $expressDelivery): self {
        $this->expressDelivery = $expressDelivery;
        return $this;
    }

    public function getTravelInformations(): array {
        return $this->travelInformations;
    }

    public function setTravelInformations(array $travelInformations): self {
        $this->travelInformations = $travelInformations;
        return $this;
    }
}

