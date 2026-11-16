<?php

namespace com\trip\tourop\model\order;

class Discount
{
    /**
     * @var Policy[]
     */
    private $policyList = [];

    public function getPolicyList(): array
    {
        return $this->policyList;
    }

    public function setPolicyList(array $policyList): self
    {
        $this->policyList = $policyList;
        return $this;
    }
}