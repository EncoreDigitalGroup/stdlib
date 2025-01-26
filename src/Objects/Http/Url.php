<?php

namespace EncoreDigitalGroup\StdLib\Objects\Http;

/** @api */
class Url
{
    public static function encode(mixed $data): string
    {
        return urlencode($data);
    }

    public static function decode(mixed $data): ?string
    {
        if (not_null($data)) {
            return urldecode($data);
        }

        return $data;
    }
}
