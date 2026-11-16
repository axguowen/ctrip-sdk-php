<?php

namespace com\trip\tourop\model\order;

class EditOrderConfirmModelItem
{
    /**
     * @Required
     * @var string
     */
    private string $itemId;

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(string $itemId): self
    {
        $this->itemId = $itemId;
        return $this;
    }
}