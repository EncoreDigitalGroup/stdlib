<?php

use EncoreDigitalGroup\StdLib\Value;

if (! function_exists('not_null')) {
    function not_null(mixed $value): bool
    {
        return Value::notNull($value);
    }
}

if (! function_exists('val_not_null')) {
    function val_not_null(mixed $value): bool
    {
        return Value::notNull($value);
    }
}
