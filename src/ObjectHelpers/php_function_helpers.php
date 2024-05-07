<?php

if (!function_exists('get_type')) {
    /**
     * @noinspection PhpMissingReturnTypeInspection
     * @phpstan-ignore-next-line
     */
    function get_type(mixed $value)
    {
        return gettype($value);
    }
}