<?php

namespace EncoreDigitalGroup\StdLib\Objects;

/**
 * @api
 *
 * @internal
 */

use Illuminate\Support\Str as StringSupport;

/** @api */
class Str extends StringSupport
{
    /**@param array<string, string> ...$str */
    public static function concat(mixed ...$str): string
    {
        $str = array_merge(...$str);

        return implode('', $str);
    }

    /**
     * @param  array<string, string>  ...$str
     *
     * @deprecated No replacement.
     *
     * @codeCoverageIgnore deprecated
     */
    public static function concatSpace(mixed ...$str): string
    {
        $str = array_merge($str);

        return implode(' ', $str); //@phpstan-ignore-line
    }

    public static function guid(): string
    {
        return Str::uuid()->toString();
    }

    public static function empty(): string
    {
        return '';
    }

    public static function toString(mixed $value): string
    {
        return (string) $value;
    }

    public static function maxLength(string $value, ?int $length = null): string
    {
        if ($length === null) {
            $length = 100; // Use this for default length to account for helper functions that don't pass a length
        }

        return Str::limit($value, $length);
    }
}
