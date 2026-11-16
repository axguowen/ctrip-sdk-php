<?php

namespace com\trip\tourop\util;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class TouropLogger {
    private static ?Logger $logger = null;
    private const LOG_SPLIT = '|';
    private static ?string $osName = null;
    private static bool $needEnableLogger = true;

    private static function initLogger(): void {
        if (self::$logger === null) {
            self::$logger = new Logger('TouropLogger');

            $handler = new StreamHandler(
                dirname(__DIR__, 3) . '/logs/tourop.log',
                Logger::INFO
            );

            $formatter = new LineFormatter(
                "[%datetime%] %channel%.%level_name%: %message%\n",
                'Y-m-d H:i:s'
            );
            $handler->setFormatter($formatter);

            self::$logger->pushHandler($handler);
        }
    }


    public static function setNeedEnableLogger(bool $needEnableLogger): void {
        self::$needEnableLogger = $needEnableLogger;
    }

    public static function write(string $accountId, string $sdkVersion, string $apiName, string $url, string $modelJson, float $costTime, string $res): void {
        if (!self::$needEnableLogger) {
            return;
        }

        self::initLogger();
        $logMessage = self::buildLogApi($accountId, $sdkVersion, $apiName, $url, $modelJson, $costTime, $res);
        self::$logger->info($logMessage);
    }

    private static function buildLogApi(string $accountId, string $sdkVersion, string $apiName, string $url, string $modelJson, float $costTime, string $res): string {
        $sb = [];
        $sb[] = self::formatDateTime(new \DateTime()); // timestamp
        $sb[] = self::LOG_SPLIT;
        $sb[] = $accountId; // account Id
        $sb[] = self::LOG_SPLIT;
        $sb[] = $sdkVersion;
        $sb[] = self::LOG_SPLIT;
        $sb[] = $apiName;
        $sb[] = self::LOG_SPLIT;
        $sb[] = TouropUtils::getIntranetIp(); // internal ip address
        $sb[] = self::LOG_SPLIT;
        $sb[] = self::getOsName();
        $sb[] = self::LOG_SPLIT;
        $sb[] = $costTime;
        $sb[] = self::LOG_SPLIT;
        $sb[] = $url; // gateway URL
        $sb[] = self::LOG_SPLIT;
        $sb[] = $modelJson; // parameters
        $sb[] = self::LOG_SPLIT;
        $sb[] = $res; // error info

        return implode('', $sb);
    }

    private static function formatDateTime(\DateTime $date): string
    {
        return TouropUtils::formatDateTime($date, 'Y-m-d H:i:s.v');
    }

    private static function getOsName(): string
    {
        if (self::$osName === null) {
            self::$osName = php_uname('s');
        }
        return self::$osName;
    }
}