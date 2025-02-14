<?php

if (!function_exists("validate_bool")) {
    function validate_bool(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}
