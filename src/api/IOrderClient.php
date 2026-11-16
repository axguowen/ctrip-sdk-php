<?php

namespace com\trip\tourop\api;

use com\trip\tourop\model\order\CreateOrderConfirmModel;
use com\trip\tourop\model\order\OrderTravelNoticeModel;
use com\trip\tourop\model\order\OrderConsumedNoticeModel;
use com\trip\tourop\model\order\CancelOrderConfirmModel;
use com\trip\tourop\model\order\RefundOrderConfirmModel;
use com\trip\tourop\model\order\EditOrderConfirmModel;
use com\trip\tourop\api\TouropResponse;
use com\trip\tourop\util\ApiException;

/**
 * Client to initialize an API call to Trip.com regarding of order process
 */
interface IOrderClient {
    /**
     * When the supplier needs to asynchronously confirm the operation (accept, reject) after the payment is submitted
     * for the pre-order order, the supplier's final confirmation result can be returned to Trip through this interface.
     * It is not acceptable to push the results of multiple different operations (acceptance, rejection) to Trip for the same batch of orders.
     * @param CreateOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function payPreOrderConfirm(CreateOrderConfirmModel $model): TouropResponse;

    /**
     * When new order places, supplier operates new order after asynchronous confirmation (acception/rejection), the final
     * confirmation result will be returned to Trip through this interface. Trip does not accept multiple operations (acception/rejection)
     * from the same batch.
     * @param CreateOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function createOrderConfirm(CreateOrderConfirmModel $model): TouropResponse;

    /**
     * An optional APi to inform Trip.com travel ticket status, such as used,
     * @param OrderTravelNoticeModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function orderTravelNotice(OrderTravelNoticeModel $model): TouropResponse;

    /**
     * After the order is confirmed, suppliers can call the interface throughguest's using condition or returned items after the trip,
     * the final results will be returned to Trip's system by suppliers. For example, the admission result, Wi-Fi and other rental operation
     * @param OrderConsumedNoticeModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function orderConsumedNotice(OrderConsumedNoticeModel $model): TouropResponse;

    /**
     * After an order is canceled, supplier needs to operate orders (accept or reject) after checking asynchronously, the
     * final confirmation result of supplier can be returned to Trip through this interface.Trip does not accept multiple
     * cancellation operations(acception/rejection) from the same batch.
     * @param CancelOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function cancelOrderConfirm(CancelOrderConfirmModel $model): TouropResponse;

    /**
     * After an order is refunded, supplier needs to operate orders (accept or reject) after checking asynchronously, the
     * final confirmation result of supplier can be returned to Trip through this interface. Trip does not accept multiple
     * cancellation operations(acception/rejection) from the same batch.
     * @param RefundOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function refundOrderConfirm(RefundOrderConfirmModel $model): TouropResponse;

    /**
     * After an order is modify, supplier needs to operate orders (accept or reject) after checking asynchronously, the
     * final confirmation result of supplier can be returned to Trip through this interface. Trip does not accept multiple
     * modify operations(acception/rejection) from the same batch.
     * @param EditOrderConfirmModel $model
     * @return TouropResponse
     * @throws ApiException
     */
    public function editOrderConfirm(EditOrderConfirmModel $model): TouropResponse;
}