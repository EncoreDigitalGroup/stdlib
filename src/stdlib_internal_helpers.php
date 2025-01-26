<?php

/*
 * Copyright (c) 2024. Encore Digital Group.
 * All Right Reserved.
 */

if (!function_exists('stdlib_vendor_dir')) {
    function stdlib_vendor_dir(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . '/../../';
        }

        return __DIR__ . '/../../' . $path;
    }
}

if (!function_exists('stdlib_src')) {
    function stdlib_src(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . "/";
        }

        return __DIR__ . "/" . $path;
    }
}

if (!function_exists('stdlib_internal_resources')) {
    function stdlib_internal_resources(?string $path = null): string
    {
        if ($path == null) {
            return __DIR__ . "/Support/Internal/Resources";
        }

        return __DIR__ . "/Support/Internal/Resources/" . $path;
    }
}