<?php
/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

declare(strict_types=1);

use EncoreDigitalGroup\StdLib\Support\Internal\Rector\Rector;
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ParamTypeByMethodCallTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ParamTypeByParentCallTypeRector;

function skipTypeHintsForMacroable(): array
{
    $paramTypeRules = array_filter([
        AddMethodCallBasedStrictParamTypeRector::class,
        ParamTypeByMethodCallTypeRector::class,
        ParamTypeByParentCallTypeRector::class,
    ], "class_exists");

    return array_fill_keys($paramTypeRules, [
        "*Macroable.php::__callStatic",
    ]);
}

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . "/src",
    ])
    ->withRules(Rector::rules())
    ->withSkip(skipTypeHintsForMacroable());
