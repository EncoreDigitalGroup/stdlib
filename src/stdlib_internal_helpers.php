<?php


if (!function_exists("stdlib_vendor_dir")) {
    /** @codeCoverageIgnore */
    function stdlib_vendor_dir(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . "/../../";
        }

        return __DIR__ . "/../../" . $path;
    }
}

if (!function_exists("stdlib_src")) {
    /** @codeCoverageIgnore */
    function stdlib_src(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . "/";
        }

        return __DIR__ . "/" . $path;
    }
}

if (!function_exists("stdlib_internal_resources")) {
    /** @codeCoverageIgnore */
    function stdlib_internal_resources(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . "/Support/Internal/Resources";
        }

        return __DIR__ . "/Support/Internal/Resources/" . $path;
    }
}