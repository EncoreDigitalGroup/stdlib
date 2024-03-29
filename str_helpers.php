<?php

use EncoreDigitalGroup\StdLib\Str;

if (! function_exists('guid')) {
    function guid(): string
    {
        return Str::guid();
    }
}

if (! function_exists('str_camel')) {
    function str_camel(string $string): string
    {
        return Str::camel($string);
    }
}

if (! function_exists('str_concat')) {
    /**@param array<string, string> ...$str */
    function str_concat(mixed ...$str): string
    {
        return Str::concat($str);
    }
}

if (! function_exists('str_concat_space')) {
    /**@param array<string, string> ...$str */
    function str_concat_space(mixed ...$str): string
    {
        return Str::concat($str);
    }
}

if (! function_exists('stringify')) {
    function stringify(mixed $str): string
    {
        return (string) $str;
    }
}
