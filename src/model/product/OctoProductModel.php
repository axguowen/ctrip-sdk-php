<?php

namespace com\trip\tourop\model\product;

use com\trip\tourop\util\Required;

/**
 * Octo product package model
 */
class OctoProductModel {

    private const SERIAL_VERSION_UID = 4174305901815296761;

    /**
     * supplier product id.
     * @Required
     * @var string
     */
    private string $supplierProductId;

    /**
     * An optional field for Supplier to identify the product.
     * @var string|null
     */
    private ?string $reference;

    /**
     * Contract ID between Supplier and Trip.com.
     * @Required
     * @var int
     */
    private int $contractId;

    /**
     * A language code indicating what language this product content is in.
     * @Required
     * @var string
     */
    private string $primaryLanguage;

    /**
     * Product status. Valid or not. active: valid; inactive: not valid.
     * @Required
     * @var string
     */
    private string $status;

    /**
     * Trip.com categories.
     * @Required
     * @var Category[]
     */
    private array $category = [];

    /**
     * Supplier product tags
     * @var Tag[]
     */
    private array $tags = [];

    /**
     * Supplier product name
     * @Required
     * @var string
     */
    private string $title;

    /**
     * Point of interest list of this product.
     * @var TravelLocation[]
     */
    private array $poi = [];

    /**
     * Destination city of the product
     * @var Destination[]
     */
    private array $destination = [];

    /**
     * Departure city of the product
     * @var Departure[]
     */
    private array $departure = [];

    /**
     * Ticket information
     * @Required
     * @var TicketInfo
     */
    private TicketInfo $ticketInfo;

    /**
     * Ticket redemption information
     * @Required
     * @var RedemptionInfo
     */
    private RedemptionInfo $redemptionInfo;

    /**
     * Available service languages of the product
     * @var Language[]
     */
    private array $serviceLanguage = [];

    /**
     * Product gallery.
     * @Required
     * @var Gallery[]
     */
    private array $gallery = [];

    /**
     * Fee included in the product
     * @var string[]
     */
    private array $inclusions = [];

    /**
     * Fee excluded in the product
     * @var string[]
     */
    private array $exclusions = [];

    /**
     * Product highlights
     * @var string[]
     */
    private array $highlight = [];

    /**
     * Product description
     * @Required
     * @var string
     */
    private string $description;

    /**
     * How to use the product
     * @var string[]
     */
    private array $howToUse = [];

    /**
     * Additional information
     * @var string|null
     */
    private ?string $additionalInfo;

    /**
     * Travel duration
     * @var TravelDuration|null
     */
    private ?TravelDuration $duration;

    /**
     * Travel itinerary
     * @var TravelItinerary[]
     */
    private array $itinerary = [];

    /**
     * Raw description
     * @var string|null
     */
    private ?string $rawDescription;

    /**
     * Guest information
     * @var GuestInformation|null
     */
    private ?GuestInformation $guestInformation;

    /**
     * Booking settings
     * @Required
     * @var BookingSettings
     */
    private BookingSettings $bookingSettings;

    /**
     * Cancellation policy
     * @Required
     * @var CancellationPolicy
     */
    private CancellationPolicy $cancellationPolicy;

    /**
     * Ticket types
     * @Required
     * @var TicketType[]
     */
    private array $ticketType = [];

    /**
     * Options
     * @var OctoProductModelOption[]
     */
    private array $option = [];

    /**
     * Metadata
     * @var string|null
     */
    private ?string $metaData;

    public function getSupplierProductId(): ?string {
        return $this->supplierProductId;
    }

    public function setSupplierProductId(string $supplierProductId): self {
        $this->supplierProductId = $supplierProductId;
        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(?string $reference): self {
        $this->reference = $reference;
        return $this;
    }

    public function getContractId(): ?int {
        return $this->contractId;
    }

    public function setContractId(int $contractId): self {
        $this->contractId = $contractId;
        return $this;
    }

    public function getPrimaryLanguage(): ?string {
        return $this->primaryLanguage;
    }

    public function setPrimaryLanguage(string $primaryLanguage): self {
        $this->primaryLanguage = $primaryLanguage;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getCategory(): array {
        return $this->category;
    }

    public function setCategory(array $category): self {
        $this->category = $category;
        return $this;
    }

    public function getTags(): array {
        return $this->tags;
    }

    public function setTags(array $tags): self {
        $this->tags = $tags;
        return $this;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    public function getPoi(): array {
        return $this->poi;
    }

    public function setPoi(array $poi): self {
        $this->poi = $poi;
        return $this;
    }

    public function getDestination(): array {
        return $this->destination;
    }

    public function setDestination(array $destination): self {
        $this->destination = $destination;
        return $this;
    }

    public function getDeparture(): array {
        return $this->departure;
    }

    public function setDeparture(array $departure): self {
        $this->departure = $departure;
        return $this;
    }

    public function getTicketInfo(): ?TicketInfo {
        return $this->ticketInfo;
    }

    public function setTicketInfo(TicketInfo $ticketInfo): self {
        $this->ticketInfo = $ticketInfo;
        return $this;
    }

    public function getRedemptionInfo(): ?RedemptionInfo {
        return $this->redemptionInfo;
    }

    public function setRedemptionInfo(RedemptionInfo $redemptionInfo): self {
        $this->redemptionInfo = $redemptionInfo;
        return $this;
    }

    public function getServiceLanguage(): array {
        return $this->serviceLanguage;
    }

    public function setServiceLanguage(array $serviceLanguage): self {
        $this->serviceLanguage = $serviceLanguage;
        return $this;
    }

    public function getGallery(): array {
        return $this->gallery;
    }

    public function setGallery(array $gallery): self {
        $this->gallery = $gallery;
        return $this;
    }

    public function getInclusions(): array {
        return $this->inclusions;
    }

    public function setInclusions(array $inclusions): self {
        $this->inclusions = $inclusions;
        return $this;
    }

    public function getExclusions(): array {
        return $this->exclusions;
    }

    public function setExclusions(array $exclusions): self {
        $this->exclusions = $exclusions;
        return $this;
    }

    public function getHighlight(): array {
        return $this->highlight;
    }

    public function setHighlight(array $highlight): self {
        $this->highlight = $highlight;
        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }

    public function getHowToUse(): array {
        return $this->howToUse;
    }

    public function setHowToUse(array $howToUse): self {
        $this->howToUse = $howToUse;
        return $this;
    }

    public function getAdditionalInfo(): ?string {
        return $this->additionalInfo;
    }

    public function setAdditionalInfo(?string $additionalInfo): self {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function getDuration(): ?TravelDuration {
        return $this->duration;
    }

    public function setDuration(?TravelDuration $duration): self {
        $this->duration = $duration;
        return $this;
    }

    public function getItinerary(): array {
        return $this->itinerary;
    }

    public function setItinerary(array $itinerary): self {
        $this->itinerary = $itinerary;
        return $this;
    }

    public function getRawDescription(): ?string {
        return $this->rawDescription;
    }

    public function setRawDescription(?string $rawDescription): self {
        $this->rawDescription = $rawDescription;
        return $this;
    }

    public function getGuestInformation(): ?GuestInformation {
        return $this->guestInformation;
    }

    public function setGuestInformation(?GuestInformation $guestInformation): self {
        $this->guestInformation = $guestInformation;
        return $this;
    }

    public function getBookingSettings(): ?BookingSettings {
        return $this->bookingSettings;
    }

    public function setBookingSettings(BookingSettings $bookingSettings): self {
        $this->bookingSettings = $bookingSettings;
        return $this;
    }

    public function getCancellationPolicy(): ?CancellationPolicy {
        return $this->cancellationPolicy;
    }

    public function setCancellationPolicy(CancellationPolicy $cancellationPolicy): self {
        $this->cancellationPolicy = $cancellationPolicy;
        return $this;
    }

    public function getTicketType(): array {
        return $this->ticketType;
    }

    public function setTicketType(array $ticketType): self {
        $this->ticketType = $ticketType;
        return $this;
    }

    public function getOption(): array {
        return $this->option;
    }

    public function setOption(array $option): self {
        $this->option = $option;
        return $this;
    }

    public function getMetaData(): ?string {
        return $this->metaData;
    }

    public function setMetaData(?string $metaData): self {
        $this->metaData = $metaData;
        return $this;
    }

    public function getSerialVersionUid(): int {
        return self::SERIAL_VERSION_UID;
    }
}

