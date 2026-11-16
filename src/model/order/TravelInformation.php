<?php

namespace com\trip\tourop\model\order;

class TravelInformation
{
    /**
     * @Required
     * @var string
     */
    private $name;

    /**
     * @Required
     * @var string
     */
    private $content;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}