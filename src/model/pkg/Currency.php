<?php

namespace com\trip\tourop\model\pkg;

class Currency
{
    /**
     * @var string|null
     */
    private $netPriceCurrency;

    /**
     * @var string|null
     */
    private $retailPriceCurrency;

    public function getNetPriceCurrency(): ?string
    {
        return $this->netPriceCurrency;
    }

    public function setNetPriceCurrency(?string $netPriceCurrency): self
    {
        $this->netPriceCurrency = $netPriceCurrency;
        return $this;
    }

    public function getRetailPriceCurrency(): ?string
    {
        return $this->retailPriceCurrency;
    }

    public function setRetailPriceCurrency(?string $retailPriceCurrency): self
    {
        $this->retailPriceCurrency = $retailPriceCurrency;
        return $this;
    }
}