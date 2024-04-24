<?php

namespace EncoreDigitalGroup\StdLib\Objects;

/**
 * @api
 *
 * @internal
 */
class Value
{
    public static function notNull(mixed $value): bool
    {
        if ($value === null) {
            return false;
        }

        return true;
    }

    public static function transformBool(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
