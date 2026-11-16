<?php

namespace com\trip\tourop\util;

class TouropHashMap {

    private const SERIAL_VERSION_UID = -1277791390393392630;

    private array $map = [];

    public function __construct(array $map = []) {
        $this->map = $map;
    }

    public function put(string $key, $value): ?string {
        $strValue = null;

        if ($value === null) {
            $strValue = null;
        } elseif (is_string($value)) {
            $strValue = $value;
        } elseif (is_int($value)) {
            $strValue = (string) $value;
        } elseif (is_float($value)) {
            $strValue = (string) $value;
        } elseif (is_bool($value)) {
            $strValue = $value ? 'true' : 'false';
        } elseif ($value instanceof \DateTime) {
            $strValue = (string) $value->getTimestamp();
        } else {
            $strValue = (string) $value;
        }

        return $this->putString($key, $strValue);
    }

    public function putString(string $key, string $value): ?string {
        if (TouropUtils::areNotBlank($key, $value)) {
            $oldValue = $this->map[$key] ?? null;
            $this->map[$key] = $value;
            return $oldValue;
        } else {
            return null;
        }
    }

    public function get(string $key): ?string {
        return $this->map[$key] ?? null;
    }

    public function containsKey(string $key): bool {
        return array_key_exists($key, $this->map);
    }

    public function remove(string $key): ?string {
        $value = $this->map[$key] ?? null;
        unset($this->map[$key]);
        return $value;
    }

    public function clear(): void {
        $this->map = [];
    }

    public function keySet(): array {
        return array_keys($this->map);
    }

    public function values(): array {
        return array_values($this->map);
    }

    public function size(): int {
        return count($this->map);
    }

    public function isEmpty(): bool {
        return empty($this->map);
    }

    public function toArray(): array {
        return $this->map;
    }

    public function getSerialVersionUid(): int {
        return self::SERIAL_VERSION_UID;
    }
}