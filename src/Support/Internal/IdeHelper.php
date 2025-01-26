<?php

/*
 * Copyright (c) 2024. Encore Digital Group.
 * All Right Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Support\Internal;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\File;

class IdeHelper
{
    private const EDITOR_CONFIG_PATH = ".editorconfig";
    private const PINT_PATH = "pint.json";

    public static function updateEditorConfig(): void
    {
        IdeHelper::publishToProjectRoot(stdlib_internal_resources(self::EDITOR_CONFIG_PATH), self::EDITOR_CONFIG_PATH);
    }

    public static function updatePint(): void
    {
        IdeHelper::publishToProjectRoot(stdlib_internal_resources(self::PINT_PATH), self::PINT_PATH);
    }

    public static function publishToProjectRoot(string $source, string $destination): void
    {
        File::copy($source, stdlib_src("../{$destination}"));
    }
}
