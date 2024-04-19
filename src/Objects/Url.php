<?php

namespace EncoreDigitalGroup\StdLib\Objects;

class Url
{
    public static function encode(mixed $data): string
    {
        return urlencode($data);
    }

    public static function decode(string $data): string
    {
        return urldecode($data);
    }
}
