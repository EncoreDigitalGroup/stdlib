<?php

if (!function_exists("get_type")) {
    /** @phpstan-ignore-next-line */
    function get_type(mixed $value): string
    {
        return gettype($value);
    }
}
