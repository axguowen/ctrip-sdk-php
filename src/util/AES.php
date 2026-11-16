<?php

namespace com\trip\tourop\util;

/**
 * Advanced Encryption Standard
 */
class AES {
    public const CIPHER_ALGORITHM = 'AES';
    public const CIPHER_TRANSFORMATION = 'AES/CBC/PKCS5Padding';

    protected $cipher;
    protected $skeySpec;
    protected $iv;

    public function __construct(string $key, string $vector) {
        $this->init($key, $vector);
    }

    protected function init(string $key, string $vector): void {
        try {
            $raw = $key;
            $this->skeySpec = $raw;
            $this->cipher = self::CIPHER_TRANSFORMATION;
            $this->iv = $vector;
        } catch (\Exception $e) {
            throw new \RuntimeException(
                sprintf('AES initialize failure, secretKey=%s, vector=%s, errorMessage=%s',
                    $key, $vector, $e->getMessage()),
                0,
                $e
            );
        }
    }

    /**
     * Encrypt plain text into cipher text
     * @param string $plainText
     * @return string
     */
    public function encrypt(string $plainText): string {
        try {
            $encrypted = openssl_encrypt(
                $plainText,
                'AES-128-CBC',
                $this->skeySpec,
                OPENSSL_RAW_DATA,
                $this->iv
            );

            $result = '';
            for ($i = 0; $i < strlen($encrypted); $i++) {
                $byte = ord($encrypted[$i]);
                $result .= chr((($byte >> 4) & 0xF) + ord('a'));
                $result .= chr(($byte & 0xF) + ord('a'));
            }
            return $result;
        } catch (\Exception $e) {
            throw new \RuntimeException(
                sprintf('AES encryption failure, plainText=%s. errorMessage=%s',
                    $plainText, $e->getMessage()),
                0,
                $e
            );
        }
    }

    /**
     * Convert cipher back to plain text
     * @param string $cipherText
     * @return string
     */
    public function decrypt(string $cipherText): string {
        try {
            $bytes = '';
            for ($i = 0; $i < strlen($cipherText); $i += 2) {
                $c = $cipherText[$i];
                $byte = (ord($c) - ord('a')) << 4;

                $c = $cipherText[$i + 1];
                $byte += (ord($c) - ord('a'));

                $bytes .= chr($byte);
            }

            return openssl_decrypt(
                $bytes,
                'AES-128-CBC',
                $this->skeySpec,
                OPENSSL_RAW_DATA,
                $this->iv
            );
        } catch (\Exception $e) {
            throw new \RuntimeException(
                sprintf('AES decryption failure, cipherText=%s. errorMessage=%s',
                    $cipherText, $e->getMessage()),
                0,
                $e
            );
        }
    }
}