<?php

namespace EncoreDigitalGroup\StdLib\Support\PHPStan\Rules\Functions;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Type\BooleanType;
use PHPStan\Type\DynamicFunctionReturnTypeExtension;
use PHPStan\Type\Type;

class NotNull implements DynamicFunctionReturnTypeExtension
{
    public function isFunctionSupported(FunctionReflection $functionReflection): bool
    {
        return $functionReflection->getName() === 'not_null';
    }

    public function getTypeFromFunctionCall(FunctionReflection $functionReflection, Node\Expr\FuncCall $functionCall, Scope $scope): Type
    {
        return new BooleanType();
    }
}