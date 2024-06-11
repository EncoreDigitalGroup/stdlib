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

if (!function_exists('dir_scan')) {
    /** @experimental */
    function dir_scan(string $dir): array
    {
        return Directory::scan($dir);
    }
}

if (!function_exists('dir_scan_recursive')) {
    /** @experimental */
    function dir_scan_recursive(string $path): array
    {
        return Directory::scanRecursive($path);
    }
}
