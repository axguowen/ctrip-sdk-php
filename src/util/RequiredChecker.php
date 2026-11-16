<?php

namespace com\trip\tourop\util;

use ReflectionClass;
use ReflectionProperty;

class RequiredChecker {
    public static function check($obj): void {
        if ($obj === null) {
            throw new \InvalidArgumentException('Object cannot be null');
        }

        $reflection = new ReflectionClass($obj);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            if (self::isRequired($property)) {
                $property->setAccessible(true);
                
                try {
                    $value = $property->getValue($obj);
                } catch (\ReflectionException $e) {
                    throw new \InvalidArgumentException(
                        sprintf('Required field %s in class %s is not initialized',
                            $property->getName(),
                            get_class($obj)
                        )
                    );
                }
                
                if (self::isEmpty($value)) {
                    throw new \InvalidArgumentException(
                        sprintf('Required field %s in class %s cannot be null or empty',
                            $property->getName(),
                            get_class($obj)
                        )
                    );
                }

                if (is_array($value)) {
                    foreach ($value as $item) {
                        if (is_object($item)) {
                            self::check($item);
                        }
                    }
                }
            }
        }
    }

    private static function isRequired(ReflectionProperty $property): bool {
        if (str_contains($property->getName(), 'Required')) {
            return true;
        }

        $docComment = $property->getDocComment();
        if ($docComment && str_contains($docComment, '@Required')) {
            return true;
        }

        return false;
    }

    private static function isEmpty($value): bool {
        if ($value === null) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_array($value)) {
            return empty($value);
        }

        return false;
    }
}