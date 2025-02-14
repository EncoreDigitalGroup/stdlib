<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;

if (!function_exists("guid")) {
    function guid(): string
    {
        return Str::guid();
    }
}

if (!function_exists("str_camel")) {
    function str_camel(string $string): string
    {
        return Str::camel($string);
    }
}

if (!function_exists("stringify")) {
    function stringify(mixed $str): string
    {
        return Str::toString($str);
    }
}

if (!function_exists("str_limit")) {
    function str_limit(?string $str = null, int $limit = 100): ?string
    {
        if ($str == null) {
            return null;
        }

        return Str::limit($str, $limit);
    }
}

if (!function_exists("str_lower")) {
    function str_lower(?string $str = null): ?string
    {
        if ($str == null) {
            return null;
        }

        return Str::lower($str);
    }
}
