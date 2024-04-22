<?php

use EncoreDigitalGroup\StdLib\Objects\Directory;

if (!function_exists('dir_current')) {
    function dir_current(): string
    {
        return Directory::current();
    }
}
