<?php

if (!function_exists("not_null")) {
    /** @deprecated */
    function not_null(mixed $value): bool
    {
        return !is_null($value);
    }
}

if (!function_exists("val_not_null")) {
    /** @deprecated */
    function val_not_null(mixed $value): bool
    {
        return not_null($value);
    }
}

if (!function_exists("val_transform_bool")) {
    /** @deprecated Use validate_bool() instead. */
    function val_transform_bool(mixed $value): bool
    {
        return validate_bool($value);
    }
}

if (!function_exists("validate_bool")) {
    function validate_bool(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
