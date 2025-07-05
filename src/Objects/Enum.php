<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use BackedEnum;
use InvalidArgumentException;

class Enum
{
    public static function string(BackedEnum $enum): string
    {
        if (!is_string($enum->value)) {
            throw new InvalidArgumentException("Backing value must be of type string, integer provided.");
        }

        return $enum->value;
    }

    public static function int(BackedEnum $enum): int
    {
        if (!is_int($enum->value)) {
            throw new InvalidArgumentException("Backing value must be of type integer, string provided.");
        }

        return $enum->value;
    }
}
