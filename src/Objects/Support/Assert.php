<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

use EncoreDigitalGroup\StdLib\Exceptions\AssertionFailedException;

class Assert
{
    /** @phpstan-assert true $value */
    public static function true(mixed $value): void
    {
        if (!is_bool($value)) {
            throw new AssertionFailedException("Failed to assert true: value is not a boolean.");
        }

        if (!$value) {
            throw new AssertionFailedException("Failed to assert true.");
        }
    }

    /** @phpstan-assert false $value */
    public static function false(mixed $value): void
    {
        if (!is_bool($value)) {
            throw new AssertionFailedException("Failed to assert false: value is not a boolean.");
        }

        if ($value) {
            throw new AssertionFailedException("Failed to assert false.");
        }
    }

    /** @phpstan-assert !null $value */
    public static function notNull(mixed $value): void
    {
        if (is_null($value)) {
            throw new AssertionFailedException("Failed to assert not null.");
        }
    }

    /** @phpstan-assert string $value */
    public static function string(mixed $value): void
    {
        if (!is_string($value)) {
            throw new AssertionFailedException("Failed to assert string.");
        }
    }
}