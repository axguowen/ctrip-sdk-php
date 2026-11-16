<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

class LocationPoint {
    /**
     * supplier POI ID
     * @Required
     * @var string
     */
    private string $supplierId;

    /**
     * Location Mapping Elements
     * @Required
     * @var LocationMappingElement
     */
    private LocationMappingElement $mappingElements;

    public function getSupplierId(): ?string {
        return $this->supplierId;
    }

    public function setSupplierId(string $supplierId): self {
        $this->supplierId = $supplierId;
        return $this;
    }

    public function getMappingElements(): ?LocationMappingElement {
        return $this->mappingElements;
    }

    public function setMappingElements(LocationMappingElement $mappingElements): self {
        $this->mappingElements = $mappingElements;
        return $this;
    }
}

