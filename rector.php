<?php

declare(strict_types=1);

use EncoreDigitalGroup\StdLib\Support\Internal\Rector\Rector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ParamTypeByMethodCallTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ParamTypeByParentCallTypeRector;

function skipTypeHintsForMagicMethods(): array
{
    $paramTypeRules = array_filter([
        AddMethodCallBasedStrictParamTypeRector::class,
        ParamTypeByMethodCallTypeRector::class,
        ParamTypeByParentCallTypeRector::class,
    ], "class_exists");

    return array_fill_keys($paramTypeRules, [
        __DIR__ . "/src/Objects/Support/Traits/Macroable.php",
    ]);
}

return Rector::configure()
    ->withPaths([
        __DIR__ . "/src",
    ])
    ->withSkip(skipTypeHintsForMagicMethods());