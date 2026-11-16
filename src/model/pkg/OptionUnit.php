<?php

namespace com\trip\tourop\model\pkg;

class OptionUnit {
    /**
     * PLU is an id which represents the minimum unit of the product. Used when sync pricing and make orders.
     * @var string|null
     */
    private ?string $PLU;

    /**
     * An optional field for supplier to identify the product unit.
     * @var string|null
     */
    private ?string $reference;

    /**
     * The code should be setup in the octo/syncProduct endpoint (ticketType.code field) first.
     * @var string|null
     */
    private ?string $ticketTypeCode;

    /**
     * Code of custom ticket type
     * Only required and valid when ticketTypeCode is Customized.
     * @var string|null
     */
    private ?string $customCode;

    /**
     * @var Restriction|null
     */
    private ?Restriction $restrictions;

    /**
     * @var Currency|null
     */
    private ?Currency $currency;

    /**
     * @var string|null
     */
    private ?string $inventoryType;

    public function getPLU(): ?string {
        return $this->PLU;
    }

    public function setPLU(?string $PLU): self {
        $this->PLU = $PLU;
        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(?string $reference): self {
        $this->reference = $reference;
        return $this;
    }

    public function getTicketTypeCode(): ?string {
        return $this->ticketTypeCode;
    }

    public function setTicketTypeCode(?string $ticketTypeCode): self {
        $this->ticketTypeCode = $ticketTypeCode;
        return $this;
    }

    public function getCustomCode(): ?string {
        return $this->customCode;
    }

    public function setCustomCode(?string $customCode): self {
        $this->customCode = $customCode;
        return $this;
    }

    public function getRestriction(): ?Restriction {
        return $this->restrictions;
    }

    public function setRestriction(?Restriction $restriction): self {
        $this->restrictions = $restriction;
        return $this;
    }

    public function getCurrency(): ?Currency {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getInventoryType(): ?string {
        return $this->inventoryType;
    }

    public function setInventoryType(?string $inventoryType): self {
        $this->inventoryType = $inventoryType;
        return $this;
    }
}

