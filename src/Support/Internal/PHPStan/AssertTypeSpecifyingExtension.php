<?php

namespace EncoreDigitalGroup\StdLib\Support\Internal\PHPStan;

use Countable;
use EncoreDigitalGroup\StdLib\Objects\Support\Assert;
use EncoreDigitalGroup\StdLib\Support\Internal\Assertions\AssertTypeMetadata;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Analyser\SpecifiedTypes;
use PHPStan\Analyser\TypeSpecifier;
use PHPStan\Analyser\TypeSpecifierAwareExtension;
use PHPStan\Analyser\TypeSpecifierContext;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\Constant\ConstantBooleanType;
use PHPStan\Type\FloatType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\IterableType;
use PHPStan\Type\MixedType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ObjectWithoutClassType;
use PHPStan\Type\ResourceType;
use PHPStan\Type\StaticMethodTypeSpecifyingExtension;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;

class AssertTypeSpecifyingExtension implements StaticMethodTypeSpecifyingExtension, TypeSpecifierAwareExtension
{
    private TypeSpecifier $typeSpecifier;

    public static function supports(string $method): bool
    {
        $baseMethod = self::baseMethod($method);

        return (str_starts_with($method, "all") && in_array($baseMethod, ["notFalse", "notNull"], true))
            || self::typeFor($baseMethod) !== null;
    }

    private static function baseMethod(string $method): string
    {
        return match (true) {
            str_starts_with($method, "allNullOr") => lcfirst(substr($method, 9)),
            str_starts_with($method, "nullOr") => lcfirst(substr($method, 6)),
            str_starts_with($method, "all") => lcfirst(substr($method, 3)),
            default => $method,
        };
    }

    private static function typeFor(string $method): ?Type
    {
        return match (AssertTypeMetadata::phpStanAssertion($method)) {
            "string" => new StringType,
            "int" => new IntegerType,
            "float" => new FloatType,
            "bool" => new BooleanType,
            "true" => new ConstantBooleanType(true),
            "false" => new ConstantBooleanType(false),
            "null" => new NullType,
            "resource" => new ResourceType,
            "object" => new ObjectWithoutClassType,
            "object|string" => TypeCombinator::union(new ObjectWithoutClassType, new StringType),
            "array" => new ArrayType(new MixedType, new MixedType),
            "iterable" => new IterableType(new MixedType, new MixedType),
            "array|Countable" => TypeCombinator::union(
                new ArrayType(new MixedType, new MixedType),
                new ObjectType(Countable::class),
            ),
            "scalar" => TypeCombinator::union(new StringType, new IntegerType, new FloatType, new BooleanType),
            "int|float|string" => TypeCombinator::union(new StringType, new IntegerType, new FloatType),
            default => null,
        };
    }

    public function setTypeSpecifier(TypeSpecifier $typeSpecifier): void
    {
        $this->typeSpecifier = $typeSpecifier;
    }

    public function getClass(): string
    {
        return Assert::class;
    }

    public function isStaticMethodSupported(
        MethodReflection $staticMethodReflection,
        StaticCall $node,
        TypeSpecifierContext $context,
    ): bool {
        return $node->name instanceof Identifier && self::supports($node->name->toString());
    }

    public function specifyTypes(
        MethodReflection $staticMethodReflection,
        StaticCall $node,
        Scope $scope,
        TypeSpecifierContext $context,
    ): SpecifiedTypes {
        if (!$node->name instanceof Identifier || count($node->getArgs()) === 0) {
            return new SpecifiedTypes([], []);
        }

        $method = $node->name->toString();
        $baseMethod = self::baseMethod($method);

        if (str_starts_with($method, "all")) {
            $type = $this->iterableValueTypeForMethod($baseMethod, $scope, $node->getArgs());
            if ($type === null) {
                return new SpecifiedTypes([], []);
            }

            if (str_starts_with($method, "allNullOr")) {
                $type = TypeCombinator::addNull($type);
            }

            return $this->specifyIterableValues($scope, $node->getArgs()[0]->value, $type);
        }

        $type = $this->typeForMethod($baseMethod, $scope, $node->getArgs());
        if ($type === null) {
            return new SpecifiedTypes([], []);
        }

        if (str_starts_with($method, "nullOr")) {
            $type = TypeCombinator::addNull($type);
        }

        return $this->typeSpecifier->create(
            $node->getArgs()[0]->value,
            $type,
            TypeSpecifierContext::createTruthy(),
            $scope,
        );
    }

    private function typeForMethod(string $method, Scope $scope, array $arguments): ?Type
    {
        if ($method === "notNull") {
            return TypeCombinator::removeNull($scope->getType($arguments[0]->value));
        }

        if ($method === "notFalse") {
            return TypeCombinator::remove($scope->getType($arguments[0]->value), new ConstantBooleanType(false));
        }

        if ($method === "isInstanceOf" || $method === "isInstanceOfAny") {
            $classes = $arguments[1] ?? null;
            if ($classes === null) {
                return new ObjectWithoutClassType;
            }

            $names = $scope->getType($classes->value)->getObjectClassNames();
            if ($names === []) {
                return new ObjectWithoutClassType;
            }

            return TypeCombinator::union(...array_map(static fn (string $name): Type => new ObjectType($name), $names));
        }

        return self::typeFor($method);
    }

    private function iterableValueTypeForMethod(string $method, Scope $scope, array $arguments): ?Type
    {
        $valueType = $scope->getType($arguments[0]->value)->getIterableValueType();

        return match ($method) {
            "notNull" => TypeCombinator::removeNull($valueType),
            "notFalse" => TypeCombinator::remove($valueType, new ConstantBooleanType(false)),
            default => $this->typeForMethod($method, $scope, $arguments),
        };
    }

    private function specifyIterableValues(Scope $scope, Expr $expression, Type $valueType): SpecifiedTypes
    {
        $currentType = TypeCombinator::intersect(
            $scope->getType($expression),
            new IterableType(new MixedType, new MixedType),
        );

        $arrays = $currentType->getArrays();
        if ($arrays !== []) {
            $types = [];
            foreach ($arrays as $array) {
                $types[] = new ArrayType($array->getKeyType(), $valueType);
            }

            $specifiedType = TypeCombinator::union(...$types);
        } elseif ((new IterableType(new MixedType, new MixedType))->isSuperTypeOf($currentType)->yes()) {
            $specifiedType = new IterableType($currentType->getIterableKeyType(), $valueType);
        } else {
            return new SpecifiedTypes([], []);
        }

        return $this->typeSpecifier->create(
            $expression,
            $specifiedType,
            TypeSpecifierContext::createTruthy(),
            $scope,
        );
    }
}
