<?php

namespace com\trip\tourop\api;

use com\trip\tourop\model\SyncPriceModel;
use com\trip\tourop\model\SyncInventoryModel;
use com\trip\tourop\model\Product\OctoProductModel;
use com\trip\tourop\model\Pkg\OctoPackageModel;
use com\trip\tourop\model\ImageModel;
use com\trip\tourop\util\ApiException;

/**
 * Client to initialize an API call to Trip.com regarding of product synchronization
 */
interface IProductClient {
    /**
     * Synchronize product price between vendor and Trip.com backend system
     * @param SyncPriceModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncPrice(SyncPriceModel $model, string $endpoint): TouropResponse;

    /**
     * Synchronize product inventory between vendor and Trip.com backend system
     * @param SyncInventoryModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncInventory(SyncInventoryModel $model, string $endpoint): TouropResponse;

    /**
     * Create or update product information based on OCTO standard (an open standard API specification for the in-destination
     * experiences sector of the travel industry).  After the asynchronous processing, Trip.com will inform the supplier of the processing results
     * The supplier can also search for the results.
     * @param OctoProductModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncProduct(OctoProductModel $model, string $endpoint): TouropResponse;

    /**
     * Create or update the package information under a product structure imported before. After the asynchronous processing,
     * Trip.com will inform the supplier of the processing results. The supplier can also search for the results.
     * @param OctoPackageModel $model
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function syncPackage(OctoPackageModel $model, string $endpoint): TouropResponse;

    /**
     * Upload an image into Trip.com and gets an image id which can be used as the cover image of products in product or
     * package synchronization
     * @param ImageModel $image
     * @param string $endpoint
     * @return TouropResponse
     * @throws ApiException
     */
    public function uploadImage(ImageModel $image, string $endpoint): TouropResponse;
}