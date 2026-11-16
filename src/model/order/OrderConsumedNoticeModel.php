<?php

namespace com\trip\tourop\model\order;

use com\trip\tourop\util\Required;

class OrderConsumedNoticeModel extends BaseOrderModel {
    /**
     * @Required
     * @var OrderConsumedNoticeItem[]
     */
    private array $items = [];

    public function getItems(): array {
        return $this->items;
    }

    public function setItems(array $items): self {
        $this->items = $items;
        return $this;
    }
}