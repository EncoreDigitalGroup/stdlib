<?php

use EncoreDigitalGroup\StdLib\Objects\Directory;

if (!function_exists('dir_current')) {
    function dir_current(): string
    {
        return Directory::current();
    }
}

if (!function_exists('dir_here')) {
    function dir_here(): string
    {
        return Directory::here();
    }
}
