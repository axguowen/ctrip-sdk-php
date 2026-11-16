<?php

namespace com\trip\tourop\model\product;

class OctoProductModelBuilder {
    private OctoProductModel $productModel;

    public function __construct(?OctoProductModel $productModel = null) {
        $this->productModel = $productModel ?? new OctoProductModel();
    }

    public function reset(): self {
        $this->productModel = new OctoProductModel();
        return $this;
    }

    public function getModel(): OctoProductModel {
        $model = $this->productModel;
        $this->reset();
        return $model;
    }

    public function setSupplierProductId(string $supplierProductId): self {
        $this->productModel->setSupplierProductId($supplierProductId);
        return $this;
    }

    public function setReference(string $reference): self {
        $this->productModel->setReference($reference);
        return $this;
    }

    public function setContractId(int $contractId): self {
        $this->productModel->setContractId($contractId);
        return $this;
    }

    public function setPrimaryLanguage(string $primaryLanguage): self {
        $this->productModel->setPrimaryLanguage($primaryLanguage);
        return $this;
    }

    public function setStatus(string $status): self {
        $this->productModel->setStatus($status);
        return $this;
    }

    public function setCategory(array $category): self {
        $this->productModel->setCategory($category);
        return $this;
    }

    public function setTags(array $tags): self {
        $this->productModel->setTags($tags);
        return $this;
    }

    public function setTittle(string $tittle): self {
        $this->productModel->setTitle($tittle);
        return $this;
    }

    public function setPOI(array $poi): self {
        $this->productModel->setPoi($poi);
        return $this;
    }

    public function setDestination(array $destination): self {
        $this->productModel->setDestination($destination);
        return $this;
    }

    public function setDeparture(array $departure): self {
        $this->productModel->setDeparture($departure);
        return $this;
    }

    public function setTicketInfo(TicketInfo $ticketInfo): self {
        $this->productModel->setTicketInfo($ticketInfo);
        return $this;
    }

    public function setRedemptionInfo(RedemptionInfo $redemptionInfo): self {
        $this->productModel->setRedemptionInfo($redemptionInfo);
        return $this;
    }

    public function setServiceLanguage(array $serviceLanguage): self {
        $this->productModel->setServiceLanguage($serviceLanguage);
        return $this;
    }

    public function setGallery(array $gallery): self {
        $this->productModel->setGallery($gallery);
        return $this;
    }

    public function setInclusions(array $inclusions): self {
        $this->productModel->setInclusions($inclusions);
        return $this;
    }

    public function setExclusions(array $exclusions): self {
        $this->productModel->setExclusions($exclusions);
        return $this;
    }

    public function setHighlight(array $highlight): self {
        $this->productModel->setHighlight($highlight);
        return $this;
    }

    public function setDescription(string $description): self {
        $this->productModel->setDescription($description);
        return $this;
    }

    public function setHowToUse(array $howToUse): self {
        $this->productModel->setHowToUse($howToUse);
        return $this;
    }

    public function setAdditionalInfo(string $additionalInfo): self {
        $this->productModel->setAdditionalInfo($additionalInfo);
        return $this;
    }

    public function setDuration(TravelDuration $travelDuration): self {
        $this->productModel->setDuration($travelDuration);
        return $this;
    }

    public function setItinerary(array $travelItinerary): self {
        $this->productModel->setItinerary($travelItinerary);
        return $this;
    }

    public function setRawDescription(string $rawDescription): self {
        $this->productModel->setRawDescription($rawDescription);
        return $this;
    }

    public function setGuestInformation(GuestInformation $guestInformation): self {
        $this->productModel->setGuestInformation($guestInformation);
        return $this;
    }

    public function setBookingSettings(BookingSettings $bookingSettings): self {
        $this->productModel->setBookingSettings($bookingSettings);
        return $this;
    }

    public function setCancellationPolicy(CancellationPolicy $cancellationPolicy): self {
        $this->productModel->setCancellationPolicy($cancellationPolicy);
        return $this;
    }

    public function setTicketType(array $ticketType): self {
        $this->productModel->setTicketType($ticketType);
        return $this;
    }

    public function setOption(array $option): self {
        $this->productModel->setOption($option);
        return $this;
    }

    public function setMetaData(string $metaData): self {
        $this->productModel->setMetaData($metaData);
        return $this;
    }
}