<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Types;

use Illuminate\Support\Number as NumberSupport;

class Number extends NumberSupport
{
    /** Cast value to integer */
    public static function toInt(mixed $value): int
    {
        return (int) $value;
    }

    /** Validated a value can be cast to an integer. */
    public static function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }
}
