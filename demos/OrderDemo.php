<?php

namespace com\trip\tests;

use com\trip\tourop\api\impl\OrderClient;
use com\trip\tourop\model\order\CancelOrderConfirmModel;
use com\trip\tourop\model\order\CancelOrderConfirmModelItem;
use com\trip\tourop\model\order\CreateOrderConfirmModel;
use com\trip\tourop\model\order\EditOrderConfirmModel;
use com\trip\tourop\model\order\EditOrderConfirmModelItem;
use com\trip\tourop\model\order\OrderConfirmItemInventory;
use com\trip\tourop\model\order\OrderConfirmItem;
use com\trip\tourop\model\order\OrderConsumedNoticeItem;
use com\trip\tourop\model\order\PassengerVoucher;
use com\trip\tourop\model\order\OrderConsumedNoticeModel;
use com\trip\tourop\model\order\OrderTravelNoticeItem;
use com\trip\tourop\model\order\OrderTravelNoticeModel;
use com\trip\tourop\model\order\RefundOrderConfirmModel;
use com\trip\tourop\model\order\Voucher;
use com\trip\tourop\util\ApiException;
use com\trip\tourop\util\Constants;
use com\trip\tourop\util\TouropUtils;

class OrderDemo {
    // replace it with your credentials
    private const ACCOUNT_ID = "";
    private const AES_KEY = "";
    private const AES_VECTOR = "";
    private const SIGN_KEY = "";

    private OrderClient $client;

    public function __construct() {
        $this->client = new OrderClient(self::ACCOUNT_ID, self::AES_KEY, self::AES_VECTOR, self::SIGN_KEY);
//        $this->client->setLogLevel(Constants::LOG_LEVEL_INFO);
        $this->client->setEndPoint("https://ttdentry.fat.ctripqa.com/ttd-connect-orderentryapi/supplier/order/notice.do");
    }

    public static function main(): void {
        try {
            $demo = new OrderDemo();
            $demo->payPreOrderConfirm();
            $demo->createOrderConfirm();
            $demo->orderTravelNotice();
            $demo->orderConsumedNotice();
            $demo->cancelOrderConfirm();
            $demo->refundOrderConfirm();
            $demo->editOrderConfirm();
        } catch (ApiException $e) {
            echo "API Exception: " . $e->getMessage() . "\n";
        }
    }

    /**
     * @throws ApiException
     */
    public function payPreOrderConfirm(): void {
        $vouchers = [];
        $voucher = (new Voucher())
            ->setVoucherCode("voucher-code-12345")
            ->setVoucherId("2123456")
            ->setItemId("10118435601")
            ->setVoucherType(1)
            ->setVoucherSeatInfo("15#1")
            ->setVoucherData("voucher data");
        $vouchers[] = $voucher;

        $passengerVouchers = [];
        $passengerVoucher = (new PassengerVoucher())
            ->setPassengerId("3123456")
            ->setVoucherId("2123456");
        $passengerVouchers[] = $passengerVoucher;

        $inventories = [];
        $inventory = (new OrderConfirmItemInventory())
            ->setQuantity(1)
            ->setUseDate("2025-01-01");
        $inventories[] = $inventory;

        $items = [];
        $item = new OrderConfirmItem();
        $item->setItemId("10118435601")
            ->setIsCredentialVouchers(1)
            ->setPassengerVouchers($passengerVouchers)
            ->setInventoryList($inventories);
        $items[] = $item;

        $model = new CreateOrderConfirmModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W")
            ->setVoucherSender(1)
            ->setVouchers($vouchers)
            ->setItems($items)
            ->setConfirmResultCode(Constants::SUCCESS_RESULT_CODE)
            ->setConfirmResultMessage("confirm success");

        $response = $this->client->payPreOrderConfirm($model);
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
    public function createOrderConfirm(): void {
        $vouchers = [];
        $voucher = (new Voucher())
            ->setVoucherCode("voucher-code-12345")
            ->setVoucherId("12345")
            ->setItemId("10118435601")
            ->setVoucherType(1)
            ->setVoucherSeatInfo("15#1")
            ->setVoucherData("voucher data");
        $vouchers[] = $voucher;

        $passengerVouchers = [];
        $passengerVoucher = (new PassengerVoucher())
            ->setPassengerId("pass-123")
            ->setVoucherId("voucher-123");
        $passengerVouchers[] = $passengerVoucher;

        $inventories = [];
        $inventory = (new OrderConfirmItemInventory())
            ->setQuantity(1)
            ->setUseDate("2025-01-01");
        $inventories[] = $inventory;

        $items = [];
        $item = new OrderConfirmItem();
        $item->setItemId("10118435601")
            ->setIsCredentialVouchers(1)
            ->setPassengerVouchers($passengerVouchers)
            ->setInventoryList($inventories);
        $items[] = $item;

        $model = new CreateOrderConfirmModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W")
            ->setVoucherSender(1)
            ->setVouchers($vouchers)
            ->setItems($items)
            ->setConfirmResultCode(Constants::SUCCESS_RESULT_CODE)
            ->setConfirmResultMessage("confirm success");

        $response = $this->client->createOrderConfirm($model);
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
    public function orderTravelNotice(): void {
        $model = new OrderTravelNoticeModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W");

        $item = new OrderTravelNoticeItem();
        $item->setIsCredentialVouchers(1)
            ->setItemId("10118435601");

        $items = [];
        $items[] = $item;

        $model->setItems($items);

        $response = $this->client->orderTravelNotice($model);
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
    public function orderConsumedNotice(): void {
        $model = new OrderConsumedNoticeModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W");

        $item = new OrderConsumedNoticeItem();
        $item->setItemId("10118435601")
            ->setUseQuantity(1);

        $items = [];
        $items[] = $item;

        $model->setItems($items);

        $response = $this->client->orderConsumedNotice($model);
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
    public function cancelOrderConfirm(): void {
        $model = new CancelOrderConfirmModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W");

        $item = new CancelOrderConfirmModelItem();
        $item->setItemId("10118435601");

        $items = [];
        $items[] = $item;

        $model->setItems($items)
            ->setConfirmResultCode(Constants::SUCCESS_RESULT_CODE)
            ->setConfirmResultMessage("Cancel success");

        $response = $this->client->cancelOrderConfirm($model);
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
    public function refundOrderConfirm(): void {
        $model = new RefundOrderConfirmModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W")
            ->setConfirmResultCode(Constants::SUCCESS_RESULT_CODE)
            ->setConfirmResultMessage("Refund success");

        $response = $this->client->refundOrderConfirm($model);
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
    public function editOrderConfirm(): void {
        $model = new EditOrderConfirmModel();
        $model->setSequenceId(TouropUtils::getSequenceId())
            ->setOtaOrderId("T4-35601-1128170605038671")
            ->setSupplierOrderId("CTH1CDTP1M0552L50L7W");

        $item = new EditOrderConfirmModelItem();
        $item->setItemId("10118435601");

        $items = [];
        $items[] = $item;

        $model->setItems($items)
            ->setConfirmResultCode(Constants::SUCCESS_RESULT_CODE)
            ->setConfirmResultMessage("Edit success");

        $response = $this->client->editOrderConfirm($model);
        if (!$response->isSuccess()) {
            echo "fail！\n";
            echo "code: " . $response->getCode() . "\n";
            echo "message: " . $response->getMessage() . "\n";
            throw new \Exception("fail: " . $response->getCode() . " - " . $response->getMessage());
        }
    }
}

if (basename(__FILE__) === basename($_SERVER['SCRIPT_NAME'] ?? '')) {
    OrderDemo::main();
}