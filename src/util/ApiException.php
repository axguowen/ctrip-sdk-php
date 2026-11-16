<?php

namespace com\trip\tourop\util;

class ApiException extends \Exception {
    private const serialVersionUID = -238091759865257331;

    private ?string $errorCode;
    private ?string $errorMessage;

    public function __construct($message = '', $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->errorMessage = $message;
        $this->errorCode = $code;
    }

    public static function fromException(\Throwable $e): self {
        return new self($e->getMessage(), $e->getCode(), $e);
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorMessage(): string {
        return $this->errorMessage;
    }
}