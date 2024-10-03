<?php

namespace EncoreDigitalGroup\StdLib\Support\PHPStan\Type;

use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\FunctionReflection;
use PHPStan\Type\TypeCombinator;
use PHPStan\Type\TypeSpecifier;
use PHPStan\Type\TypeSpecifierAwareExtension;
use PHPStan\Type\TypeSpecifyingExtension;
use PHPStan\Analyser\TypeSpecifierContext;

/** @experimental */
class NotNullTypeSpecifyingExtension implements TypeSpecifyingExtension, TypeSpecifierAwareExtension
{
    private TypeSpecifier $typeSpecifier;

    public function setTypeSpecifier(TypeSpecifier $typeSpecifier): void
    {
        $this->typeSpecifier = $typeSpecifier;
    }

    public function isFunctionSupported(
        FunctionReflection $functionReflection,
        FuncCall           $funcCall,
        Scope              $scope
    ): bool
    {
        // Support the "not_null" function
        return $functionReflection->getName() === 'not_null';
    }

    public function specifyTypes(
        FunctionReflection   $functionReflection,
        FuncCall             $funcCall,
        Scope                $scope,
        TypeSpecifierContext $context
    ): \PHPStan\Type\Specifier\TypeSpecifierResult
    {
        // Get the type of the argument passed to "not_null"
        $argExpr = $funcCall->getArgs()[0]->value;
        $argType = $scope->getType($argExpr);

        // Remove the nullability from the type
        $specifiedType = TypeCombinator::removeNull($argType);

        // Return the modified type
        return $this->typeSpecifier->create($argExpr, $specifiedType, $context);
    }
}