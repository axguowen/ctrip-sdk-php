<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

class TicketType {
    /**
     * Available ticketTypeCode in all product units.
     * @Required
     * @var string
     */
    private string $code;

    /**
     * Code of custom ticket type.
     * @var string|null
     */
    private ?string $customCode;

    /**
     * Name of custom ticket type.
     * @var string|null
     */
    private ?string $customName;

    /**
     * @var TicketTypeRestriction|null
     */
    private ?TicketTypeRestriction $restrictions;

    /**
     * Additional description of the ticket type.
     * @var string|null
     */
    private ?string $description;

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getCustomCode(): ?string {
        return $this->customCode;
    }

    public function setCustomCode(?string $customCode): self {
        $this->customCode = $customCode;
        return $this;
    }

    public function getCustomName(): ?string {
        return $this->customName;
    }

    public function setCustomName(?string $customName): self {
        $this->customName = $customName;
        return $this;
    }

    public function getRestriction(): ?TicketTypeRestriction {
        return $this->restrictions;
    }

    public function setRestriction(?TicketTypeRestriction $restriction): self {
        $this->restrictions = $restriction;
        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;
        return $this;
    }
}

