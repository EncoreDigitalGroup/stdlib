<?php

namespace EncoreDigitalGroup\StdLib;

use Illuminate\Support\Str as StringSupport;

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
        return (string) $value;
    }
}
