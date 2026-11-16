<?php

namespace com\trip\tourop\api\impl;

use com\trip\tourop\api\impl\TouropAgent;
use com\trip\tourop\api\IOrderClient;
use com\trip\tourop\api\TouropRequest;
use com\trip\tourop\api\TouropResponse;
use com\trip\tourop\model\order\CancelOrderConfirmModel;
use com\trip\tourop\model\order\CreateOrderConfirmModel;
use com\trip\tourop\model\order\EditOrderConfirmModel;
use com\trip\tourop\model\order\OrderConsumedNoticeModel;
use com\trip\tourop\model\order\OrderTravelNoticeModel;
use com\trip\tourop\model\order\RefundOrderConfirmModel;
use com\trip\tourop\util\ApiException;
use com\trip\tourop\util\Constants;
use com\trip\tourop\util\RequiredChecker;

class OrderClient extends TouropAgent implements IOrderClient {
    /**
     * @var string|null
     */
    private ?string $endPoint;

    public function __construct(string $accountId, string $secretKey, string $vector, string $signKey) {
        parent::__construct($accountId, $secretKey, $vector, $signKey);
    }

    /**
     * @param CreateOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function payPreOrderConfirm(CreateOrderConfirmModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::PAY_PRE_ORDER_CONFIRM);
        return $this->doSync($request);
    }

    /**
     * @param CreateOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function createOrderConfirm(CreateOrderConfirmModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::CREATE_ORDER_CONFIRM);
        return $this->doSync($request);
    }

    /**
     * @param OrderTravelNoticeModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function orderTravelNotice(OrderTravelNoticeModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::ORDER_TRAVEL_NOTICE);
        return $this->doSync($request);
    }

    /**
     * @param OrderConsumedNoticeModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function orderConsumedNotice(OrderConsumedNoticeModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::ORDER_CONSUMED_NOTICE);
        return $this->doSync($request);
    }

    /**
     * @param CancelOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function cancelOrderConfirm(CancelOrderConfirmModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::CANCEL_ORDER_CONFIRM);
        return $this->doSync($request);
    }

    /**
     * @param RefundOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function refundOrderConfirm(RefundOrderConfirmModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::REFUND_ORDER_CONFIRM);
        return $this->doSync($request);
    }

    /**
     * @param EditOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function editOrderConfirm(EditOrderConfirmModel $model): TouropResponse {
        RequiredChecker::check($model);
        $request = TouropRequest::ofModel($model, $this->endPoint);
        $request->setServiceName(Constants::EDIT_ORDER_CONFIRM);
        return $this->doSync($request);
    }

    public function setEndPoint(?string $endPoint): void {
        $this->endPoint = $endPoint;
    }
}