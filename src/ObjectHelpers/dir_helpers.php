<?php

use EncoreDigitalGroup\StdLib\Objects\Directory;

if (!function_exists('dir_current')) {
    function dir_current(): string
    {
        return Directory::current();
    }
}

if (!function_exists('dir_hash')) {
    /** @experimental */
    function dir_hash(string $dir): string
    {
        return Directory::hash($dir);
    }
}
