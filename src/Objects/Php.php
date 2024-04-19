<?php

namespace EncoreDigitalGroup\StdLib\Objects;

class Php
{
    public static function versionGreaterThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '>=');
    }

    public static function versionLessThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '<=');
    }

    public static function versionGreaterThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '>');
    }

    public static function versionLessThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '<');
    }

    public static function versionEqualTo(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '==');
    }
}