<?php

namespace EncoreDigitalGroup\StdLib;

use Illuminate\Support\Number as NumberSupport;

/**
 * @api
 */
class Number extends NumberSupport
{
    public static function toInt($value): int
    {
        return (int) $value;
    }
}
