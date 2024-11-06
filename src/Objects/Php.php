<?php

namespace EncoreDigitalGroup\StdLib\Objects;

/** @api */
class Php
{
    /**
     * Check if the PHP version is greater than or equal to the given version.
     *
     * @internal
     */
    public static function versionGreaterThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '>=');
    }

    /**
     * Check if the PHP version is less than or equal to the given version.
     *
     * @internal
     */
    public static function versionLessThanOrEqual(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '<=');
    }

    /**
     * Check if the PHP version is greater than the given version.
     *
     * @internal
     */
    public static function versionGreaterThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '>');
    }

    /**
     * Check if the PHP version is less than the given version.
     *
     * @internal
     */
    public static function versionLessThan(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '<');
    }

    /**
     * Check if the PHP version is equal to the given version.
     *
     * @internal
     */
    public static function versionEqualTo(string $version): bool
    {
        return version_compare(PHP_VERSION, $version, '==');
    }
}
