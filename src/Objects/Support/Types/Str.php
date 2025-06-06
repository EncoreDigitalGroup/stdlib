<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Types;

use Illuminate\Support\Str as StringSupport;

class Str extends StringSupport
{
    public static function guid(): string
    {
        return Str::uuid()->toString();
    }

    public static function empty(): string
    {
        return "";
    }

    public static function space(): string
    {
        return " ";
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

    public static function conjunctions(string $value): array|string
    {
        $andFormatted = Str::replace(" And ", " and ", $value);
        $orFormatted = Str::replace(" Or ", " or ", $andFormatted);

        return Str::replace(" Of ", " of ", $orFormatted);
    }

    public static function formattedTitleCase(string $value): array|string
    {
        $underScoresRemoved = Str::replace("_", " ", Str::title($value));

        if (!is_string($underScoresRemoved)) {
            return $underScoresRemoved;
        }

        return Str::conjunctions($underScoresRemoved);
    }
}
