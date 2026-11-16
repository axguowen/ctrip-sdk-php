<?php

namespace com\trip\tourop\api;

use com\trip\tourop\util\Constants;

class TouropResponse {
    /**
     * @var string|null
     */
    private ?string $code;

    /**
     * @var string|null
     */
    private ?string $message;

    /**
     * @var string|null
     */
    private ?string $requestId;

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(string $message): self {
        $this->message = $message;
        return $this;
    }

    public function getRequestId(): ?string {
        return $this->requestId;
    }

    public function setRequestId(string $requestId): self {
        $this->requestId = $requestId;
        return $this;
    }

    public function isSuccess(): bool {
        return Constants::SUCCESS_RESULT_CODE === $this->code;
    }
}