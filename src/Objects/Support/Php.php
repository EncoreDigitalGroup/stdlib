<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

class Php
{
    /** Check if the PHP version is greater than or equal to the given version. */
    public static function greaterThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, ">=");
    }

    /** Check if the PHP version is less than or equal to the given version. */
    public static function lessThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, "<=");
    }

    /** Check if the PHP version is greater than the given version.*/
    public static function greaterThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, ">");
    }

    /** Check if the PHP version is less than the given version. */
    public static function lessThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, "<");
    }

    /** Check if the PHP version is equal to the given version. */
    public static function equalTo(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, "==");
    }
}
