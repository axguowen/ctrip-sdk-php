<?php

namespace com\trip\tourop\model\product;

class TicketTypeRestriction
{
    /**
     * @var int|null
     */
    private ?int $minAge;

    /**
     * @var int|null
     */
    private ?int $maxAge;

    public function getMinAge(): ?int
    {
        return $this->minAge;
    }

    public function setMinAge(?int $minAge): self
    {
        $this->minAge = $minAge;
        return $this;
    }

    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    public function setMaxAge(?int $maxAge): self
    {
        $this->maxAge = $maxAge;
        return $this;
    }
}