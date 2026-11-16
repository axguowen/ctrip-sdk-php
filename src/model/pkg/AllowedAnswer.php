<?php

namespace com\trip\tourop\model\pkg;

class AllowedAnswer
{
    /**
     * @var string|null
     */
    private ?string $code;

    /**
     * @var string|null
     */
    private ?string $name;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
}