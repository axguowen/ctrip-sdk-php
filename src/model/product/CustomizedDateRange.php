<?php

namespace com\trip\tourop\model\product;

class CustomizedDateRange
{
    /**
     * Start time. Time format: yyyy-MM-dd.
     * @Required
     * @var string
     */
    private string $fromDate;

    /**
     * End time. Time format: yyyy-MM-dd.
     * @Required
     * @var string
     */
    private string $toDate;

    public function getFromDate(): ?string
    {
        return $this->fromDate;
    }

    public function setFromDate(string $fromDate): self
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    public function getToDate(): ?string
    {
        return $this->toDate;
    }

    public function setToDate(string $toDate): self
    {
        $this->toDate = $toDate;
        return $this;
    }
}