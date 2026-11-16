<?php

namespace com\trip\tests;

use Brick\Math\BigDecimal;
use com\trip\tourop\api\impl\ProductClient;
use com\trip\tourop\model\ImageModel;
use com\trip\tourop\model\Inventory;
use com\trip\tourop\model\pkg\AllowedAnswer;
use com\trip\tourop\model\pkg\BookingCutOffTime;
use com\trip\tourop\model\pkg\BookingQuestion;
use com\trip\tourop\model\pkg\Currency;
use com\trip\tourop\model\pkg\Restriction;
use com\trip\tourop\model\pkg\OctoPackageModel;
use com\trip\tourop\model\pkg\Option;
use com\trip\tourop\model\pkg\OptionBrief;
use com\trip\tourop\model\pkg\OptionUnit;
use com\trip\tourop\model\product\OctoProductModelOption;
use com\trip\tourop\model\product\TicketTypeRestriction;
use com\trip\tourop\model\Price;
use com\trip\tourop\model\product\BookingSettings;
use com\trip\tourop\model\product\BookingType;
use com\trip\tourop\model\product\CancellationPolicy;
use com\trip\tourop\model\product\Category;
use com\trip\tourop\model\product\DateLimit;
use com\trip\tourop\model\product\Departure;
use com\trip\tourop\model\product\Destination;
use com\trip\tourop\model\product\Gallery;
use com\trip\tourop\model\product\GuestInformation;
use com\trip\tourop\model\product\Language;
use com\trip\tourop\model\product\LocationMappingElement;
use com\trip\tourop\model\product\LocationPoint;
use com\trip\tourop\model\product\OctoProductModelBuilder;
use com\trip\tourop\model\product\RedemptionInfo;
use com\trip\tourop\model\product\RedemptionLocation;
use com\trip\tourop\model\product\Tag;
use com\trip\tourop\model\product\TicketInfo;
use com\trip\tourop\model\product\TicketType;
use com\trip\tourop\model\product\TravelDuration;
use com\trip\tourop\model\product\TravelItinerary;
use com\trip\tourop\model\product\TravelLocation;
use com\trip\tourop\model\product\TripStart;
use com\trip\tourop\model\SyncInventoryModel;
use com\trip\tourop\model\SyncPriceModel;
use com\trip\tourop\util\ApiException;
use com\trip\tourop\util\Constants;
use com\trip\tourop\util\TouropUtils;

class ProductDemo {
    // replace it with your credentials
    const ACCOUNT_ID = "";
    const AES_KEY = "";
    const AES_VECTOR = "";
    const SIGN_KEY = "";

    private ProductClient $client;

    public function __construct() {
        $this->client = new ProductClient(self::ACCOUNT_ID, self::AES_KEY, self::AES_VECTOR, self::SIGN_KEY);
        $this->client->setLogLevel(Constants::LOG_LEVEL_INFO);
    }

    public static function main(): void {
        try {
            $demo = new ProductDemo();
            $demo->syncPrice();
            $demo->syncInventory();
            $demo->syncOctoProduct();
            $demo->uploadImage();
            $demo->syncPackage();
        } catch (ApiException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    /**
     * @throws ApiException
     */
    public function syncPrice(): void {
        $prices = [];
        $price = new Price();
        $price->setCostPrice(BigDecimal::of("80.00"));
        $price->setSalePrice(BigDecimal::of("100.00"));
        $price->setDate("2025-10-10");
        $prices[] = $price;

        $syncPriceModel = new SyncPriceModel();
        $syncPriceModel->setDateType("DATE_REQUIRED");
        $syncPriceModel->setSequenceId(TouropUtils::getSequenceId());
        $syncPriceModel->setSupplierOptionId("WDW_ZM0RF");
        $syncPriceModel->setPrices($prices);

        $response = $this->client->syncPrice($syncPriceModel, "https://ttdentry.fat.ctripqa.com/ttd-connect-productentryapi/api/product/price.do");
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }

    /**
     * @throws ApiException
     */
    public function syncInventory(): void
    {
        $inventory = new Inventory();
        $inventory->setQuantity(100);
        $inventory->setDate("2025-10-10");

        $syncInventoryModel = new SyncInventoryModel();
        $syncInventoryModel->setDateType("DATE_REQUIRED");
        $syncInventoryModel->setSequenceId(TouropUtils::getSequenceId());
        $syncInventoryModel->setSupplierOptionId("WDW_ZM0RF");
        $syncInventoryModel->setInventoryList([$inventory]);

        $response = $this->client->syncInventory($syncInventoryModel, "https://ttdentry.fat.ctripqa.com/ttd-connect-productentryapi/api/product/stock.do");
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }

    /**
     * @throws ApiException
     */
    public function syncOctoProduct(): void
    {
        $category = [];
        $category[] = (new Category())->setCode("Attraction_Ticket");

        $tags = [];
        $tags[] = (new Tag())->setTagName("Avoid the crowd")->setId("1");

        $poi = [];
        $poiLocationPoint = (new LocationPoint())
            ->setSupplierId("Ricky_location_1")
            ->setMappingElements((new LocationMappingElement())
                ->setAddressDetail("Discesa Caracciolo Vicerè, 213/201, 90133 Palermo PA, Italy")
                ->setName("Discesa Caracciolo - Ingresso Vucciria")
                ->setLatitude("38.117171")
                ->setLongitude("13.3633978"));
        $poi[] = (new TravelLocation())->setGooglePlaceId("Ricky_location_1")->setSupplierPOI($poiLocationPoint);

        $destination = [];
        $destinationLocation = (new LocationPoint())
            ->setSupplierId("1001")
            ->setMappingElements((new LocationMappingElement())
                ->setAddressDetail("Discesa Caracciolo Vicerè, 213/201, 90133 Palermo PA, Italy")
                ->setName("Discesa Caracciolo - Ingresso Vucciria")
                ->setLatitude("38.117171")
                ->setLongitude("13.3633978"));
        $destination[] = (new Destination())->setGooglePlaceId("xxxxxx")->setSupplierDestination($destinationLocation);

        $departure = [];
        $departureLocation = (new LocationPoint())
            ->setSupplierId("1001")
            ->setMappingElements((new LocationMappingElement())
                ->setAddressDetail("Discesa Caracciolo Vicerè, 213/201, 90133 Palermo PA, Italy")
                ->setName("Discesa Caracciolo - Ingresso Vucciria")
                ->setLatitude("38.117171")
                ->setLongitude("13.3633978"));
        $departure[] = (new Departure())->setGooglePlaceId("xxxxxx")->setSupplierDeparture($departureLocation);

        $redemptionInfo = new RedemptionInfo();
        $redemptionLocation = (new LocationPoint())
            ->setSupplierId("1001")
            ->setMappingElements((new LocationMappingElement())
                ->setAddressDetail("Discesa Caracciolo Vicerè, 213/201, 90133 Palermo PA, Italy")
                ->setName("Discesa Caracciolo - Ingresso Vucciria")
                ->setLatitude("38.117171")
                ->setLongitude("13.3633978"));
        $redemptionInfo->setRedemptionType("Direct_Entry")->setDescription("This is a description")
            ->setRedemptionLocation((new RedemptionLocation())->setSupplierLocation($redemptionLocation)->setGooglePlaceId("xxxxx"));

        $serviceLanguage = [];
        $serviceLanguage[] = (new Language())->setLanguageCode("zh-CN");

        $gallery = [];
        $gallery[] = (new Gallery())->setTripImageId("25874717");

        $inclusions = [];
        $inclusions[] = "Fee1";

        $exclusions = [];
        $exclusions[] = "Fee2";

        $highlight = [];
        $highlight[] = "Highlight";

        $howToUse = [];
        $howToUse[] = "How to use";

        $itinerary = [];
        $itinerary1 = new TravelItinerary();
        $start = (new TripStart())->setStartTime("09:00")->setStartType("Meet_at_Start_Point");

        $guestInformation = (new GuestInformation())->setType("PER_PERSON");
        $code = [];
        $code[] = "GUEST_NAME";
        $code[] = "COUNTRY";
        $code[] = "BIRTH_DATE";
        $code[] = "PassportNo";
        $guestInformation->setCode($code);

        $bookingSettings = (new BookingSettings())->setPaymentConfirmationTime(30);
        $bookingType = new BookingType();
        $dateLimit = (new DateLimit())->setDateLimitType("Single_date");
        $bookingType->setDateType("DATE_REQUIRED");
        $bookingType->setDateLimit($dateLimit);
        $bookingSettings->setBookingType($bookingType);

        $cancellationPolicy = (new CancellationPolicy())->setType("Non_Cancellable")->setConfirmationTime(8);

        $ticketType = [];
        $adultTicketType = (new TicketType())->setCode("Adult")->setCustomCode("Adult-Code")->setCustomName("Adult-Name");
        $adultRestriction = new TicketTypeRestriction();
        $adultRestriction->setMaxAge(60)->setMinAge(20);
        $adultTicketType->setRestriction($adultRestriction);
        $ticketType[] = $adultTicketType;

        $option = [];
        $option[] = (new OctoProductModelOption())->setOptionCode("Option");

        $builder = new OctoProductModelBuilder();
        $builder->setSupplierProductId("SUPPLIER-PRODUCT-A")
            ->setReference("SUPPLIER-REF")
            ->setContractId(200952)
            ->setPrimaryLanguage("en-US")
            ->setStatus("active")
            ->setCategory($category)
            ->setTags($tags)
            ->setTittle("Product Name")
            ->setPOI($poi)
            ->setDestination($destination)
            ->setDeparture($departure)
            ->setTicketInfo((new TicketInfo())->setDeliveryMethods("DIGITAL"))
            ->setRedemptionInfo($redemptionInfo)
            ->setServiceLanguage($serviceLanguage)
            ->setGallery($gallery)
            ->setInclusions($inclusions)
            ->setExclusions($exclusions)
            ->setHighlight($highlight)
            ->setDescription("This is a product description")
            ->setHowToUse($howToUse)
            ->setAdditionalInfo("This is an additional info")
            ->setDuration((new TravelDuration())->setUnit("Day")->setValue(10))
            ->setRawDescription("This is a raw description")
            ->setGuestInformation($guestInformation)
            ->setBookingSettings($bookingSettings)
            ->setCancellationPolicy($cancellationPolicy)
            ->setTicketType($ticketType)
            ->setOption($option)
            ->setMetaData("Extended Information");

        $response = $this->client->syncProduct($builder->getModel(), "https://ttdentry.fat.ctripqa.com/ttd-connect-productentryapi/octo/syncProduct.do");
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }

    /**
     * @throws ApiException
     */
    public function syncPackage(): void
    {
        $model = new OctoPackageModel();
        $optionList = [];

        $optionBriefs = [];
        $brief = (new OptionBrief())->setOptionCode("option")->setValueCode("Time_Slot_1")->setValueName("19:00");
        $optionBriefs[] = $brief;

        $bookingCutOffTime = (new BookingCutOffTime())->setTime("10:00")->setDayBeforeVisitDate("1");

        $bookingQuestionList = [];
        $bookingQuestion = (new BookingQuestion())
            ->setCode("question001")
            ->setName("Please Select Service Language")
            ->setAnswerType("Free_Text")
            ->setDescription("Question description");
        $allowedAnswer = (new AllowedAnswer())->setCode("code1")->setName("English guide");
        $bookingQuestion->setAllowedAnswer($allowedAnswer);
        $bookingQuestionList[] = $bookingQuestion;

        $unitList = [];
        $optionUnit = (new OptionUnit())->setPLU("unit001")
            ->setReference("unit reference")
            ->setCustomCode("custom code 1")
            ->setTicketTypeCode("Adult")
            ->setInventoryType("FREE_SALE");
        $currency = (new Currency())->setNetPriceCurrency("USD")->setRetailPriceCurrency("USD");
        $restriction = (new Restriction())->setMaxUnits("10")->setMinUnits("1")->setUnitPax("1")->setCompanionRequired("Required");
        $optionUnit->setCurrency($currency)->setRestriction($restriction);
        $unitList[] = $optionUnit;

        $option = (new Option())
            ->setOptionBriefList($optionBriefs)
            ->setOptionStatus("active")
            ->setOptionDescription("option introduction 1")
            ->setBookingCutOffTime($bookingCutOffTime)
            ->setBookingQuestions($bookingQuestionList)
            ->setUnitList($unitList);

        $optionList[] = $option;
        $model->setSupplierProductId("SUPPLIER-PRODUCT-A")->setOptionList($optionList);

        $response = $this->client->syncPackage($model, "https://ttdentry.fat.ctripqa.com/ttd-connect-productentryapi/octo/syncPackage.do");
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }

    /**
     * @throws ApiException
     */
    public function uploadImage(): void
    {
        $image = (new ImageModel())->setImageUrl("https://dimg04.c-ctrip.com/images/0450o120009mapmy6B344.png");
        $response = $this->client->uploadImage($image, "https://ttdentry.fat.ctripqa.com/ttd-connect-productentryapi/octo/uploadImage.do");
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }
}

if (basename(__FILE__) == basename($_SERVER['SCRIPT_NAME'])) {
    ProductDemo::main();
}