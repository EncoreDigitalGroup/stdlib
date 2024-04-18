<?php

namespace EncoreDigitalGroup\StdLib;

class Url
{
    public function encode(mixed $data): string
    {
        return urlencode($data);
    }

    public function decode(string $data): string
    {
        return urldecode($data);
    }
}
