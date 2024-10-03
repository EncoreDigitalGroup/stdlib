<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Attributes\Deprecated;

/**
 * @api
 * @deprecated
 * @internal
 */
#[Deprecated]
class Value
{
    public static function notNull(mixed $value): bool
    {
        return $value !== null;
    }

    public static function transformBool(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
