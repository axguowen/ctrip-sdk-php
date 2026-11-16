<?php

namespace com\trip\tourop\model\product;

class Tag
{
    /**
     * @Required
     * @var string
     */
    private string $id;

    /**
     * @Required
     * @var string
     */
    private string $tagName;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTagName(): ?string
    {
        return $this->tagName;
    }

    public function setTagName(string $tagName): self
    {
        $this->tagName = $tagName;
        return $this;
    }
}