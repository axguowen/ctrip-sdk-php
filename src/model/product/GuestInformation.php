<?php

namespace com\trip\tourop\model\product;

class GuestInformation
{
    /**
     * @Required
     * @var string
     */
    private string $type;

    /**
     * @Required
     * @var string[]
     */
    private array $code = [];

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getCode(): array
    {
        return $this->code;
    }

    public function setCode(array $code): self
    {
        $this->code = $code;
        return $this;
    }
}