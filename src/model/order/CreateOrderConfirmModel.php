<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class CreateOrderConfirmModel extends BaseOrderModel {
    /**
     * @Required
     * @var string
     */
    private string $confirmResultCode;

    /**
     * @Required
     * @var string
     */
    private string $confirmResultMessage;

    /**
     * @Required
     * @var int
     */
    private int $voucherSender;

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
     * @var OrderConfirmItem[]
     */
    private array $items = [];

    public function getConfirmResultCode(): ?string {
        return $this->confirmResultCode;
    }

    public function setConfirmResultCode(string $confirmResultCode): self {
        $this->confirmResultCode = $confirmResultCode;
        return $this;
    }

    public function getConfirmResultMessage(): ?string {
        return $this->confirmResultMessage;
    }

    public function setConfirmResultMessage(string $confirmResultMessage): self {
        $this->confirmResultMessage = $confirmResultMessage;
        return $this;
    }

    public function getVoucherSender(): ?int {
        return $this->voucherSender;
    }

    public function setVoucherSender(int $voucherSender): self {
        $this->voucherSender = $voucherSender;
        return $this;
    }

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