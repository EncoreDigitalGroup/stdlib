<?php

namespace EncoreDigitalGroup\StdLib\Support\Internal\Generators;

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;
use EncoreDigitalGroup\StdLib\Support\Internal\Assertions\AssertTypeMetadata;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionType;
use RuntimeException;

final class AssertableGenerator
{
    private const string TARGET_PATH = __DIR__ . '/../../../Objects/Support/Traits/Assertable.php';

    public static function write(): void
    {
        if (file_put_contents(self::TARGET_PATH, self::contents()) === false) {
            throw new RuntimeException('Unable to generate Assertable.php.');
        }
    }

    public static function assertCurrent(): void
    {
        if (file_get_contents(self::TARGET_PATH) !== self::contents()) {
            throw new RuntimeException('Assertable.php is stale. Run composer generate:assertable.');
        }
    }

    public static function contents(): string
    {
        $methods = array_filter(
            (new ReflectionClass(Assert::class))->getMethods(),
            static fn (ReflectionMethod $method): bool => $method->isPublic()
                && $method->isStatic()
                && $method->getDeclaringClass()->getName() === Assert::class
                && $method->getName() !== '__callStatic',
        );

        usort($methods, static fn (ReflectionMethod $left, ReflectionMethod $right): int => $left->getName() <=> $right->getName());

        $generatedMethods = implode("\n\n", array_map(self::renderMethod(...), $methods));

        return <<<PHP
<?php

// This file is generated from Assert. Run composer generate:assertable to update it.

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;

trait Assertable
{
{$generatedMethods}
}

PHP;
    }

    private static function renderMethod(ReflectionMethod $method): string
    {
        $docComment = $method->getDocComment();
        $documentation = $docComment === false
            ? self::renderAssertionDocumentation($method)
            : self::indent($docComment) . "\n";
        $parameters = implode(', ', array_map(self::renderParameter(...), $method->getParameters()));
        $arguments = implode(', ', array_map(self::renderArgument(...), $method->getParameters()));
        $returnType = self::renderType($method->getReturnType());

        return sprintf(
            "%s    protected function assert%s(%s)%s\n    {\n        Assert::%s(%s);\n    }",
            $documentation,
            ucfirst($method->getName()),
            $parameters,
            $returnType === '' ? '' : ': ' . $returnType,
            in_array($method->getName(), ['true', 'false', 'null'], true)
                ? strtoupper($method->getName())
                : $method->getName(),
            $arguments,
        );
    }

    private static function renderParameter(ReflectionParameter $parameter): string
    {
        $type = self::renderType($parameter->getType());
        $reference = $parameter->isPassedByReference() ? '&' : '';
        $variadic = $parameter->isVariadic() ? '...' : '';
        $default = self::renderDefaultValue($parameter);

        return sprintf(
            '%s%s%s$%s%s',
            $type === '' ? '' : $type . ' ',
            $reference,
            $variadic,
            $parameter->getName(),
            $default,
        );
    }

    private static function renderAssertionDocumentation(ReflectionMethod $method): string
    {
        if ($method->getName() === 'isInstanceOf') {
            return <<<'PHP'
    /**
     * @template T of object
     *
     * @param  class-string<T>  $class
     *
     * @phpstan-assert T $value
     */

PHP;
        }

        if ($method->getName() === 'isInstanceOfAny') {
            return <<<'PHP'
    /**
     * @template T of object
     *
     * @param  iterable<class-string<T>>  $classes
     *
     * @phpstan-assert T $value
     */

PHP;
        }

        $type = AssertTypeMetadata::phpStanAssertion($method->getName());

        return $type === null ? '' : "    /** @phpstan-assert {$type} \$value */\n";
    }

    private static function renderArgument(ReflectionParameter $parameter): string
    {
        return ($parameter->isVariadic() ? '...' : '') . '$' . $parameter->getName();
    }

    private static function renderType(?ReflectionType $type): string
    {
        return $type === null ? '' : (string) $type;
    }

    private static function renderDefaultValue(ReflectionParameter $parameter): string
    {
        if (!$parameter->isDefaultValueAvailable() || $parameter->isVariadic()) {
            return '';
        }

        $constant = $parameter->getDefaultValueConstantName();

        if ($constant !== null) {
            return ' = ' . $constant;
        }

        $defaultValue = $parameter->getDefaultValue();

        return ' = ' . ($defaultValue === null ? 'null' : var_export($defaultValue, true));
    }

    private static function indent(string $value): string
    {
        return implode("\n", array_map(static fn (string $line): string => '    ' . $line, explode("\n", $value)));
    }
}
