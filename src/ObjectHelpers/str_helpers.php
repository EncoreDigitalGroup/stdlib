<?php

use EncoreDigitalGroup\StdLib\Objects\Str;

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

if (!function_exists("str_concat")) {
    /**
     * @param  array<string, string>  ...$str
     *
     * @deprecated
     */
    function str_concat(mixed ...$str): string
    {
        return Str::concat($str);
    }
}

if (!function_exists("str_concat_space")) {
    /**
     * @param  array<string, string>  ...$str
     *
     * @deprecated
     */
    function str_concat_space(mixed ...$str): string
    {
        return Str::concatSpace($str); //@phpstan-ignore-line
    }
}

if (!function_exists("str_enum_val")) {
    /** @deprecated use enum() instead */
    function str_enum_val(mixed $enum): string
    {
        return Str::toString($enum->value);
    }
}

if (!function_exists("stringify")) {
    function stringify(mixed $str): string
    {
        return (string) $str;
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

if (!function_exists("str_max_length")) {
    /** @deprecated use str_limit() instead. */
    function str_max_length(string $str, ?int $length = null): string
    {
        return Str::maxLength($str, $length);
    }
}
