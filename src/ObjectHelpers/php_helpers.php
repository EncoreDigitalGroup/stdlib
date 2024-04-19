<?php

use EncoreDigitalGroup\StdLib\Objects\Php;

if (!function_exists('php_version_at_least')) {
    function php_version_at_least(string $version): bool
    {
        return Php::versionGreaterThanOrEqual($version);
    }
}

if (!function_exists('php_version_at_most')) {
    function php_version_at_most(string $version): bool
    {
        return Php::versionLessThanOrEqual($version);
    }
}

if (!function_exists('php_version_greater_than')) {
    function php_version_greater_than(string $version): bool
    {
        return Php::versionGreaterThan($version);
    }
}

if (!function_exists('php_version_less_than')) {
    function php_version_less_than(string $version): bool
    {
        return Php::versionLessThan($version);
    }
}

if (!function_exists('php_version')) {
    function php_version(string $version): bool
    {
        return Php::versionEqualTo($version);
    }
}

if (!function_exists('php_version_is')) {
    function php_version_is(string $version): bool
    {
        return Php::versionEqualTo($version);
    }
}