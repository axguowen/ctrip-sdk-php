<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class EditOrderConfirmModel extends BaseOrderModel {
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
     * @var EditOrderConfirmModelItem[]
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

    public function getItems(): array {
        return $this->items;
    }

    public function setItems(array $items): self {
        $this->items = $items;
        return $this;
    }
}

