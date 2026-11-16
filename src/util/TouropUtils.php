<?php

namespace com\trip\tourop\util;

/**
 * Trip tour open platform utilities
 */
class TouropUtils {
    private static ?string $intranetIp = null;

    /**
     * Format date use target pattern.
     */
    public static function formatDateTime(\DateTime $date, string $pattern): string {
        return $date->format($pattern);
    }

    /**
     * Get a md5 signature
     */
    public static function getMD5Signature(string $data): string {
        try {
            $bytes = md5($data, true);

            $ret = '';
            for ($i = 0; $i < strlen($bytes); $i++) {
                $ret .= sprintf('%02x', ord($bytes[$i]));
            }

            return strtolower($ret);
        } catch (\Exception $e) {
            throw new \RuntimeException(
                sprintf('Failed to sign with MD5, data=%s. %s', $data, $e->getMessage()),
                0,
                $e
            );
        }
    }

    /**
     * Get Supplier’s Batch Number,
     */
    public static function getSequenceId(): string {
        $uuid = str_replace('-', '', uniqid());
        return self::formatDateTime(new \DateTime(), 'Y-m-d') . $uuid;
    }

    /**
     * Get local IP address. Return 127.0.0.1 when any exception happen.
     */
    public static function getIntranetIp(): string {
        if (self::$intranetIp === null) {
            try {
                self::$intranetIp = gethostbyname(gethostname());
                if (self::$intranetIp === gethostname()) {
                    self::$intranetIp = '127.0.0.1';
                }
            } catch (\Exception $e) {
                self::$intranetIp = '127.0.0.1';
            }
        }
        return self::$intranetIp;
    }

    public static function isBlank(?string $value): bool {
        if ($value === null || strlen($value) === 0) {
            return true;
        }

        for ($i = 0; $i < strlen($value); $i++) {
            if (!ctype_space($value[$i])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check whether the given string list are null or blank.
     */
    public static function areNotBlank(string ...$values): bool {
        if (empty($values)) {
            return false;
        }

        foreach ($values as $value) {
            if (self::isBlank($value)) {
                return false;
            }
        }
        return true;
    }
}