<?php

/*
 * Copyright (c) 2024. Encore Digital Group.
 * All Right Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Support\Internal\Composer;

use Composer\InstalledVersions;

/** @internal */
class Composer
{
    public const string ILLUMINATE_SUPPORT = "illuminate/support";

    public static function installed(string $package): bool
    {
        return InstalledVersions::isInstalled($package);
    }

    public static function version(string $package): string
    {
        $version = InstalledVersions::getVersion($package);

        /**
         * If we were unable to obtain the version from the composer runtime API,
         * we force the version to be something that is generally considered to be invalid.
         */
        if (is_null($version)) {
            $version = "0.0.0";
        }

        return $version;
    }
}