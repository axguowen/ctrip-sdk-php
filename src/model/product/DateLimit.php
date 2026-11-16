<?php

namespace com\trip\tourop\model\product;

class DateLimit
{
    /**
     * @Required
     * @var string
     */
    private string $dateLimitType;

    private ?string $multiDateDuration;

    private ?CustomizedDateRange $customizedDateRange;

    public function getDateLimitType(): ?string
    {
        return $this->dateLimitType;
    }

    public function setDateLimitType(string $dateLimitType): self
    {
        $this->dateLimitType = $dateLimitType;
        return $this;
    }

    public function getMultiDateDuration(): ?string
    {
        return $this->multiDateDuration;
    }

    public function setMultiDateDuration(?string $multiDateDuration): self
    {
        $this->multiDateDuration = $multiDateDuration;
        return $this;
    }

    public function getCustomizedDateRange(): ?CustomizedDateRange
    {
        return $this->customizedDateRange;
    }

    public function setCustomizedDateRange(?CustomizedDateRange $customizedDateRange): self
    {
        $this->customizedDateRange = $customizedDateRange;
        return $this;
    }
}