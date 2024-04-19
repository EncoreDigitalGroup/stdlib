<?php

use EncoreDigitalGroup\StdLib\Objects\Url;

if (!function_exists('url_encode')) {
    function url_encode(mixed $value): string
    {
        return Url::encode($value);
    }
}

if (!function_exists('url_decode')) {
    function url_decode(mixed $value): ?string
    {
        return Url::decode($value);
    }
}
