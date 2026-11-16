<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class OrderTravelNoticeModel extends BaseOrderModel {
    /**
     * @var Voucher[]
     */
    private array $vouchers = [];

    /**
     * @var string|null
     */
    private ?string $orderExtendMessage;

    /**
     * @Required
     * @var OrderTravelNoticeItem[]
     */
    private array $items = [];

    public function getVouchers(): array {
        return $this->vouchers;
    }

    public function setVouchers(array $vouchers): self {
        $this->vouchers = $vouchers;
        return $this;
    }

    public function getOrderExtendMessage(): ?string {
        return $this->orderExtendMessage;
    }

    public function setOrderExtendMessage(?string $orderExtendMessage): self {
        $this->orderExtendMessage = $orderExtendMessage;
        return $this;
    }

    public function getItems(): array {
        return $this->items;
    }

    public function setItems(array $items): self {
        $this->items = $items;
        return $this;
    }
}