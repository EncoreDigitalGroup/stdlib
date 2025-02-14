<?php

namespace EncoreDigitalGroup\StdLib\Objects\Http;

class Url
{
    public static function encode(mixed $data): string
    {
        return urlencode($data);
    }

    public static function decode(mixed $data): ?string
    {
        if (!is_null($data)) {
            return urldecode($data);
        }

        return $data;
    }
}
