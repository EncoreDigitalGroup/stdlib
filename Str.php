<?php

namespace EncoreDigitalGroup\StdLib;

use Illuminate\Support\Str as StringSupport;

/**
 * @api
 */
class Str extends StringSupport
{
    /**@param array<string, string> ...$str */
    public static function concat(mixed ...$str): string
    {
        return implode('', $str);
    }

    /**@param array<string, string> ...$str */
    public static function concatSpace(mixed ...$str): string
    {
        return implode(' ', $str);
    }

    public static function guid(): string
    {
        return Str::uuid()->toString();
    }

    public static function toString(mixed $value): string
    {
        return (string)$value;
    }

    public static function maxLength(string $value, ?int $length = null): string
    {
        if ($length === null) {
            $length = 100; // Use this for default length to account for helper functions that don't pass a length
        }

        return Str::limit($value, $length);
    }
}
