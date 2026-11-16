<?php

namespace com\trip\tourop\api\impl;

use com\trip\tourop\api\IProductClient;
use com\trip\tourop\api\TouropRequest;
use com\trip\tourop\api\TouropResponse;
use com\trip\tourop\model\ImageModel;
use com\trip\tourop\model\SyncInventoryModel;
use com\trip\tourop\model\SyncPriceModel;
use com\trip\tourop\model\pkg\OctoPackageModel;
use com\trip\tourop\model\product\OctoProductModel;
use com\trip\tourop\util\ApiException;
use com\trip\tourop\util\Constants;
use com\trip\tourop\util\RequiredChecker;

class ProductClient extends TouropAgent implements IProductClient {
    public function __construct(string $accountId, string $secretKey, string $vector, string $signKey) {
        parent::__construct($accountId, $secretKey, $vector, $signKey);
    }

    /**
     * @param SyncPriceModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncPrice(SyncPriceModel $model, string $endpoint): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $endpoint);
        $request->setServiceName(Constants::DATE_PRICE_MODIFY);
        return $this->doSync($request);
    }

    /**
     * @param SyncInventoryModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncInventory(SyncInventoryModel $model, string $endpoint): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $endpoint);
        $request->setServiceName(Constants::DATE_INVENTORY_MODIFY);
        return $this->doSync($request);
    }

    /**
     * @param OctoProductModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncProduct(OctoProductModel $model, string $endpoint): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $endpoint);
        return $this->doSync($request);
    }

    /**
     * @param OctoPackageModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncPackage(OctoPackageModel $model, string $endpoint): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $endpoint);
        return $this->doSync($request);
    }

    /**
     * @param ImageModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function uploadImage(ImageModel $model, string $endpoint): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $endpoint);
        return $this->doSync($request);
    }
}