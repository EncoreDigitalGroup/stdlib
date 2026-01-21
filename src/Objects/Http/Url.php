<?php

namespace EncoreDigitalGroup\StdLib\Objects\Http;

use Illuminate\Support\Uri;

class Url
{
    public static function of(string $url = ""): Uri
    {
        return Uri::of($url);
    }

    public static function encode(mixed $data): string
    {
        return urlencode($data);
    }

    public static function decode(mixed $data): ?string
    {
        if (!is_null($data)) {
            return urldecode($data);
        }

        return null;
    }
}
