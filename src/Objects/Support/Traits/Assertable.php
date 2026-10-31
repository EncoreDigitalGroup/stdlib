<?php

// This file is generated from Assert. Run composer generate:assertable to update it.

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;

trait Assertable
{
    /** @phpstan-assert string $value */
    protected function assertAlnum(mixed $value, string $message = ""): void
    {
        Assert::alnum($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertAlpha(mixed $value, string $message = ""): void
    {
        Assert::alpha($value, $message);
    }

    /** @phpstan-assert bool $value */
    protected function assertBoolean(mixed $value, string $message = ""): void
    {
        Assert::boolean($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertClassExists(mixed $value, string $message = ""): void
    {
        Assert::classExists($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertContains(mixed $value, mixed $substring, string $message = ""): void
    {
        Assert::contains($value, $substring, $message);
    }

    protected function assertCount(mixed $array, mixed $number, string $message = ""): void
    {
        Assert::count($array, $number, $message);
    }

    protected function assertCountBetween(mixed $array, mixed $min, mixed $max, string $message = ""): void
    {
        Assert::countBetween($array, $min, $max, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertDigits(mixed $value, string $message = ""): void
    {
        Assert::digits($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertDirectory(mixed $value, string $message = ""): void
    {
        Assert::directory($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertEmail(mixed $value, string $message = ""): void
    {
        Assert::email($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertEndsWith(mixed $value, mixed $suffix, string $message = ""): void
    {
        Assert::endsWith($value, $suffix, $message);
    }

    protected function assertEq(mixed $value, mixed $expected, string $message = ""): void
    {
        Assert::eq($value, $expected, $message);
    }

    /** @phpstan-assert false $value */
    protected function assertFalse(mixed $value, string $message = ""): void
    {
        Assert::FALSE($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertFile(mixed $value, string $message = ""): void
    {
        Assert::file($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertFileExists(mixed $value, string $message = ""): void
    {
        Assert::fileExists($value, $message);
    }

    /** @phpstan-assert float $value */
    protected function assertFloat(mixed $value, string $message = ""): void
    {
        Assert::float($value, $message);
    }

    protected function assertGreaterThan(mixed $value, mixed $limit, string $message = ""): void
    {
        Assert::greaterThan($value, $limit, $message);
    }

    protected function assertGreaterThanEq(mixed $value, mixed $limit, string $message = ""): void
    {
        Assert::greaterThanEq($value, $limit, $message);
    }

    protected function assertImplementsInterface(mixed $value, mixed $interface, string $message = ""): void
    {
        Assert::implementsInterface($value, $interface, $message);
    }

    protected function assertInArray(mixed $value, mixed $values, string $message = ""): void
    {
        Assert::inArray($value, $values, $message);
    }

    /** @phpstan-assert int $value */
    protected function assertInteger(mixed $value, string $message = ""): void
    {
        Assert::integer($value, $message);
    }

    /** @phpstan-assert int|float|string $value */
    protected function assertIntegerish(mixed $value, string $message = ""): void
    {
        Assert::integerish($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertInterfaceExists(mixed $value, string $message = ""): void
    {
        Assert::interfaceExists($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertIp(mixed $value, string $message = ""): void
    {
        Assert::ip($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertIpv4(mixed $value, string $message = ""): void
    {
        Assert::ipv4($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertIpv6(mixed $value, string $message = ""): void
    {
        Assert::ipv6($value, $message);
    }

    /** @phpstan-assert object|string $value */
    protected function assertIsAOf(mixed $value, mixed $class, string $message = ""): void
    {
        Assert::isAOf($value, $class, $message);
    }

    /** @phpstan-assert object|string $value */
    protected function assertIsAnyOf(mixed $value, mixed $classes, string $message = ""): void
    {
        Assert::isAnyOf($value, $classes, $message);
    }

    /** @phpstan-assert array $value */
    protected function assertIsArray(mixed $value, string $message = ""): void
    {
        Assert::isArray($value, $message);
    }

    protected function assertIsArrayAccessible(mixed $value, string $message = ""): void
    {
        Assert::isArrayAccessible($value, $message);
    }

    protected function assertIsCallable(mixed $value, string $message = ""): void
    {
        Assert::isCallable($value, $message);
    }

    /** @phpstan-assert array|Countable $value */
    protected function assertIsCountable(mixed $value, string $message = ""): void
    {
        Assert::isCountable($value, $message);
    }

    protected function assertIsEmpty(mixed $value, string $message = ""): void
    {
        Assert::isEmpty($value, $message);
    }

    protected function assertIsInitialized(mixed $value, string $property, string $message = ""): void
    {
        Assert::isInitialized($value, $property, $message);
    }

    /**
     * @template T of object
     *
     * @param  class-string<T>  $class
     *
     * @phpstan-assert T $value
     */
    protected function assertIsInstanceOf(mixed $value, mixed $class, string $message = ""): void
    {
        Assert::isInstanceOf($value, $class, $message);
    }

    /**
     * @template T of object
     *
     * @param  iterable<class-string<T>>  $classes
     *
     * @phpstan-assert T $value
     */
    protected function assertIsInstanceOfAny(mixed $value, mixed $classes, string $message = ""): void
    {
        Assert::isInstanceOfAny($value, $classes, $message);
    }

    /** @phpstan-assert iterable $value */
    protected function assertIsIterable(mixed $value, string $message = ""): void
    {
        Assert::isIterable($value, $message);
    }

    /** @phpstan-assert array $value */
    protected function assertIsList(mixed $array, string $message = ""): void
    {
        Assert::isList($array, $message);
    }

    /** @phpstan-assert array $value */
    protected function assertIsMap(mixed $array, string $message = ""): void
    {
        Assert::isMap($array, $message);
    }

    /** @phpstan-assert array $value */
    protected function assertIsNonEmptyList(mixed $array, string $message = ""): void
    {
        Assert::isNonEmptyList($array, $message);
    }

    /** @phpstan-assert array $value */
    protected function assertIsNonEmptyMap(mixed $array, string $message = ""): void
    {
        Assert::isNonEmptyMap($array, $message);
    }

    protected function assertIsNotA(mixed $value, mixed $class, string $message = ""): void
    {
        Assert::isNotA($value, $class, $message);
    }

    protected function assertIsStatic(mixed $closure, string $message = ""): void
    {
        Assert::isStatic($closure, $message);
    }

    protected function assertKeyExists(mixed $array, string|int $key, string $message = ""): void
    {
        Assert::keyExists($array, $key, $message);
    }

    protected function assertKeyNotExists(mixed $array, string|int $key, string $message = ""): void
    {
        Assert::keyNotExists($array, $key, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertLength(mixed $value, mixed $length, string $message = ""): void
    {
        Assert::length($value, $length, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertLengthBetween(mixed $value, mixed $min, mixed $max, string $message = ""): void
    {
        Assert::lengthBetween($value, $min, $max, $message);
    }

    protected function assertLessThan(mixed $value, mixed $limit, string $message = ""): void
    {
        Assert::lessThan($value, $limit, $message);
    }

    protected function assertLessThanEq(mixed $value, mixed $limit, string $message = ""): void
    {
        Assert::lessThanEq($value, $limit, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertLower(mixed $value, string $message = ""): void
    {
        Assert::lower($value, $message);
    }

    protected function assertMaxCount(mixed $array, mixed $max, string $message = ""): void
    {
        Assert::maxCount($array, $max, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertMaxLength(mixed $value, mixed $max, string $message = ""): void
    {
        Assert::maxLength($value, $max, $message);
    }

    protected function assertMethodExists(mixed $classOrObject, mixed $method, string $message = ""): void
    {
        Assert::methodExists($classOrObject, $method, $message);
    }

    protected function assertMethodNotExists(mixed $classOrObject, mixed $method, string $message = ""): void
    {
        Assert::methodNotExists($classOrObject, $method, $message);
    }

    protected function assertMinCount(mixed $array, mixed $min, string $message = ""): void
    {
        Assert::minCount($array, $min, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertMinLength(mixed $value, mixed $min, string $message = ""): void
    {
        Assert::minLength($value, $min, $message);
    }

    /** @phpstan-assert int $value */
    protected function assertNatural(mixed $value, string $message = ""): void
    {
        Assert::natural($value, $message);
    }

    /** @phpstan-assert int $value */
    protected function assertNegativeInteger(mixed $value, string $message = ""): void
    {
        Assert::negativeInteger($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertNotContains(mixed $value, mixed $substring, string $message = ""): void
    {
        Assert::notContains($value, $substring, $message);
    }

    protected function assertNotEmpty(mixed $value, string $message = ""): void
    {
        Assert::notEmpty($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertNotEndsWith(mixed $value, mixed $suffix, string $message = ""): void
    {
        Assert::notEndsWith($value, $suffix, $message);
    }

    protected function assertNotEq(mixed $value, mixed $expected, string $message = ""): void
    {
        Assert::notEq($value, $expected, $message);
    }

    /** @phpstan-assert !false $value */
    protected function assertNotFalse(mixed $value, string $message = ""): void
    {
        Assert::notFalse($value, $message);
    }

    protected function assertNotInArray(mixed $value, mixed $values, string $message = ""): void
    {
        Assert::notInArray($value, $values, $message);
    }

    protected function assertNotInstanceOf(mixed $value, mixed $class, string $message = ""): void
    {
        Assert::notInstanceOf($value, $class, $message);
    }

    /** @phpstan-assert int $value */
    protected function assertNotNegativeInteger(mixed $value, string $message = ""): void
    {
        Assert::notNegativeInteger($value, $message);
    }

    /** @phpstan-assert !null $value */
    protected function assertNotNull(mixed $value, string $message = ""): void
    {
        Assert::notNull($value, $message);
    }

    protected function assertNotOneOf(mixed $value, mixed $values, string $message = ""): void
    {
        Assert::notOneOf($value, $values, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertNotRegex(mixed $value, mixed $pattern, string $message = ""): void
    {
        Assert::notRegex($value, $pattern, $message);
    }

    protected function assertNotSame(mixed $value, mixed $expected, string $message = ""): void
    {
        Assert::notSame($value, $expected, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertNotStartsWith(mixed $value, mixed $prefix, string $message = ""): void
    {
        Assert::notStartsWith($value, $prefix, $message);
    }

    protected function assertNotStatic(mixed $closure, string $message = ""): void
    {
        Assert::notStatic($closure, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertNotWhitespaceOnly(mixed $value, string $message = ""): void
    {
        Assert::notWhitespaceOnly($value, $message);
    }

    /** @phpstan-assert null $value */
    protected function assertNull(mixed $value, string $message = ""): void
    {
        Assert::NULL($value, $message);
    }

    /** @phpstan-assert int|float|string $value */
    protected function assertNumeric(mixed $value, string $message = ""): void
    {
        Assert::numeric($value, $message);
    }

    /** @phpstan-assert object $value */
    protected function assertObject(mixed $value, string $message = ""): void
    {
        Assert::object($value, $message);
    }

    /** @phpstan-assert object|string $value */
    protected function assertObjectish(mixed $value, string $message = ""): void
    {
        Assert::objectish($value, $message);
    }

    protected function assertOneOf(mixed $value, mixed $values, string $message = ""): void
    {
        Assert::oneOf($value, $values, $message);
    }

    /** @phpstan-assert int $value */
    protected function assertPositiveInteger(mixed $value, string $message = ""): void
    {
        Assert::positiveInteger($value, $message);
    }

    protected function assertPropertyExists(mixed $classOrObject, mixed $property, string $message = ""): void
    {
        Assert::propertyExists($classOrObject, $property, $message);
    }

    protected function assertPropertyNotExists(mixed $classOrObject, mixed $property, string $message = ""): void
    {
        Assert::propertyNotExists($classOrObject, $property, $message);
    }

    protected function assertRange(mixed $value, mixed $min, mixed $max, string $message = ""): void
    {
        Assert::range($value, $min, $max, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertReadable(mixed $value, string $message = ""): void
    {
        Assert::readable($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertRegex(mixed $value, mixed $pattern, string $message = ""): void
    {
        Assert::regex($value, $pattern, $message);
    }

    /** @phpstan-assert resource $value */
    protected function assertResource(mixed $value, ?string $type = null, string $message = ""): void
    {
        Assert::resource($value, $type, $message);
    }

    protected function assertSame(mixed $value, mixed $expected, string $message = ""): void
    {
        Assert::same($value, $expected, $message);
    }

    /** @phpstan-assert scalar $value */
    protected function assertScalar(mixed $value, string $message = ""): void
    {
        Assert::scalar($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertStartsWith(mixed $value, mixed $prefix, string $message = ""): void
    {
        Assert::startsWith($value, $prefix, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertStartsWithLetter(mixed $value, string $message = ""): void
    {
        Assert::startsWithLetter($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertString(mixed $value, string $message = ""): void
    {
        Assert::string($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertStringNotEmpty(mixed $value, string $message = ""): void
    {
        Assert::stringNotEmpty($value, $message);
    }

    protected function assertSubclassOf(mixed $value, mixed $class, string $message = ""): void
    {
        Assert::subclassOf($value, $class, $message);
    }

    protected function assertThrows(mixed $closure, mixed $class, string $message = ""): void
    {
        Assert::throws($closure, $class, $message);
    }

    /** @phpstan-assert true $value */
    protected function assertTrue(mixed $value, string $message = ""): void
    {
        Assert::TRUE($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertUnicodeLetters(mixed $value, string $message = ""): void
    {
        Assert::unicodeLetters($value, $message);
    }

    protected function assertUniqueValues(mixed $values, string $message = ""): void
    {
        Assert::uniqueValues($values, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertUpper(mixed $value, string $message = ""): void
    {
        Assert::upper($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertUuid(mixed $value, string $message = ""): void
    {
        Assert::uuid($value, $message);
    }

    protected function assertValidArrayKey(mixed $value, string $message = ""): void
    {
        Assert::validArrayKey($value, $message);
    }

    /** @phpstan-assert string $value */
    protected function assertWritable(mixed $value, string $message = ""): void
    {
        Assert::writable($value, $message);
    }
}
