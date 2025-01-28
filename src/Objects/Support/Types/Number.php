<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Types;

use Illuminate\Support\Number as NumberSupport;

/** @api */
class Number extends NumberSupport
{
    /**
     * Convert a value to an integer.
     *
     * @param  mixed  $value
     */
    public static function toInt($value): int
    {
        return (int) $value;
    }

    public static function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }
}
