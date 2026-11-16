<?php

namespace com\trip\tourop\util;

interface Constants {
    const SUCCESS_RESULT_CODE = '0000';

    /**
     * tourop parameters
     **/
    const ACCOUNT_ID = 'accountId';
    const SERVICE_NAME = 'serviceName';
    const REQUEST_TIME = 'requestTime';
    const VERSION = 'version';
    const SIGN = 'sign';
    const AUTHORIZATION = 'Authorization';

    const HEADER = 'header';
    const BODY = 'body';
    const RSP_CODE = 'resultCode';
    const RSP_MSG = 'resultMessage';
    const RSP_REQUEST_ID = 'requestId';

    const DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    const CHARSET_UTF8 = 'UTF-8';

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    const SIGN_METHOD_MD5 = 'md5';

    const SDK_VERSION = 'trip-tourop-sdk-php-beta';
    const ACCEPT_ENCODING = 'Accept-Encoding';
    const CONTENT_ENCODING_GZIP = 'gzip';

    /**
     * tourop log level
     **/
    const LOG_LEVEL_DEBUG = 'DEBUG';
    const LOG_LEVEL_INFO = 'INFO';
    const LOG_LEVEL_ERROR = 'ERROR';

    /**
     * Service Name
     **/
    const DATE_PRICE_MODIFY = 'DatePriceModify';
    const DATE_INVENTORY_MODIFY = 'DateInventoryModify';

    const PAY_PRE_ORDER_CONFIRM = 'PayPreOrderConfirm';
    const CREATE_ORDER_CONFIRM = 'CreateOrderConfirm';
    const ORDER_TRAVEL_NOTICE = 'OrderTravelNotice';
    const ORDER_CONSUMED_NOTICE = 'OrderConsumedNotice';
    const CANCEL_ORDER_CONFIRM = 'CancelOrderConfirm';
    const REFUND_ORDER_CONFIRM = 'RefundOrderConfirm';
    const EDIT_ORDER_CONFIRM = 'EditOrderConfirm';
}