<?php

namespace EncoreDigitalGroup\StdLib\Support\Internal\PHPStan;

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;

class AssertMagicMethodsExtension implements MethodsClassReflectionExtension
{
    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        return $classReflection->getName() === Assert::class
            && $this->isMagicAssertion($methodName);
    }

    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        return new AssertMagicMethodReflection($classReflection, $methodName);
    }

    private function isMagicAssertion(string $methodName): bool
    {
        return (str_starts_with($methodName, "nullOr") || str_starts_with($methodName, "all"))
            && AssertTypeSpecifyingExtension::supports($methodName);
    }
}
