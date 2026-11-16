<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class RefundOrderConfirmModel extends BaseOrderModel {
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
}