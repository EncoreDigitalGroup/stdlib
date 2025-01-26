<?php

namespace EncoreDigitalGroup\StdLib\Support\Types;

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
}
