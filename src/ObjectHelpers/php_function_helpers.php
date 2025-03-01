<?php

if (!function_exists("get_type")) {
    /** @phpstan-ignore-next-line */
    function get_type(mixed $value): string
    {
        if (is_object($value)) {
            return get_class($value);
        }

        return gettype($value);
    }
}
