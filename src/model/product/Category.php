<?php

namespace com\trip\tourop\model\product;

class Category
{
    /**
     * @Required
     * @var string
     */
    private string $code;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}