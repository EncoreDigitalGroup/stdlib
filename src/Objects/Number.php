<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use Illuminate\Support\Number as NumberSupport;

/**
 * @api
 * @internal
 */
class Number extends NumberSupport
{
    /**
     * Convert a value to an integer.
     *
     * @param mixed $value
     * @return int
     */
    public static function toInt($value): int
    {
        return (int) $value;
    }
}
