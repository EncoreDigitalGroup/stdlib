<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

use ArrayAccess;
use BadMethodCallException;
use Closure;
use Countable;
use EncoreDigitalGroup\StdLib\Exceptions\AssertionFailedException;
use ReflectionFunction;
use ReflectionProperty;
use Throwable;

class Assert
{
    /** @phpstan-assert true $value */
    public static function true(mixed $value, string $message = ''): void
    {
        if ($value !== true) {
            self::fail($message, 'Failed to assert true.');
        }
    }

    /** @phpstan-assert false $value */
    public static function false(mixed $value, string $message = ''): void
    {
        if ($value !== false) {
            self::fail($message, 'Failed to assert false.');
        }
    }

    /** @phpstan-assert !null $value */
    public static function notNull(mixed $value, string $message = ''): void
    {
        if ($value === null) {
            self::fail($message, 'Failed to assert not null.');
        }
    }

    /** @phpstan-assert string $value */
    public static function string(mixed $value, string $message = ''): void
    {
        if (!is_string($value)) {
            self::fail($message, 'Failed to assert string.');
        }
    }

    public static function stringNotEmpty(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::notSame($value, '', $message);
    }

    public static function integer(mixed $value, string $message = ''): void
    {
        self::check(is_int($value), $message, 'Failed to assert integer.');
    }

    public static function integerish(mixed $value, string $message = ''): void
    {
        self::check(is_numeric($value) && $value == (int) $value, $message, 'Failed to assert integerish value.');
    }

    public static function positiveInteger(mixed $value, string $message = ''): void
    {
        self::integer($value, $message);
        self::check($value > 0, $message, 'Failed to assert positive integer.');
    }

    public static function negativeInteger(mixed $value, string $message = ''): void
    {
        self::integer($value, $message);
        self::check($value < 0, $message, 'Failed to assert negative integer.');
    }

    public static function notNegativeInteger(mixed $value, string $message = ''): void
    {
        self::integer($value, $message);
        self::check($value >= 0, $message, 'Failed to assert non-negative integer.');
    }

    public static function float(mixed $value, string $message = ''): void
    {
        self::check(is_float($value), $message, 'Failed to assert float.');
    }

    public static function numeric(mixed $value, string $message = ''): void
    {
        self::check(is_numeric($value), $message, 'Failed to assert numeric value.');
    }

    public static function natural(mixed $value, string $message = ''): void
    {
        self::check(is_int($value) && $value >= 0, $message, 'Failed to assert natural number.');
    }

    public static function boolean(mixed $value, string $message = ''): void
    {
        self::check(is_bool($value), $message, 'Failed to assert boolean.');
    }

    public static function scalar(mixed $value, string $message = ''): void
    {
        self::check(is_scalar($value), $message, 'Failed to assert scalar.');
    }

    public static function object(mixed $value, string $message = ''): void
    {
        self::check(is_object($value), $message, 'Failed to assert object.');
    }

    public static function objectish(mixed $value, string $message = ''): void
    {
        self::check(is_object($value) || (is_string($value) && class_exists($value)), $message, 'Failed to assert object or existing class name.');
    }

    public static function resource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::check(is_resource($value) && ($type === null || get_resource_type($value) === $type), $message, 'Failed to assert resource.');
    }

    public static function isInitialized(mixed $value, string $property, string $message = ''): void
    {
        self::object($value, $message);
        self::check((new ReflectionProperty($value, $property))->isInitialized($value), $message, 'Failed to assert initialized property.');
    }

    public static function isCallable(mixed $value, string $message = ''): void
    {
        self::check(is_callable($value), $message, 'Failed to assert callable.');
    }

    public static function isArray(mixed $value, string $message = ''): void
    {
        self::check(is_array($value), $message, 'Failed to assert array.');
    }

    public static function isArrayAccessible(mixed $value, string $message = ''): void
    {
        self::check(is_array($value) || $value instanceof ArrayAccess, $message, 'Failed to assert array-accessible value.');
    }

    public static function isCountable(mixed $value, string $message = ''): void
    {
        self::check(is_array($value) || $value instanceof Countable, $message, 'Failed to assert countable value.');
    }

    public static function isIterable(mixed $value, string $message = ''): void
    {
        self::check(is_iterable($value), $message, 'Failed to assert iterable value.');
    }

    public static function isInstanceOf(mixed $value, mixed $class, string $message = ''): void
    {
        self::string($class, $message);
        self::check($value instanceof $class, $message, 'Failed to assert instance of class.');
    }

    public static function notInstanceOf(mixed $value, mixed $class, string $message = ''): void
    {
        self::string($class, $message);
        self::check(is_object($value) && !($value instanceof $class), $message, 'Failed to assert object is not an instance of class.');
    }

    public static function isInstanceOfAny(mixed $value, mixed $classes, string $message = ''): void
    {
        self::isIterable($classes, $message);
        foreach ($classes as $class) {
            if (is_string($class) && $value instanceof $class) {
                return;
            }
        } self::fail($message, 'Failed to assert instance of any class.');
    }

    public static function isAOf(mixed $value, mixed $class, string $message = ''): void
    {
        self::string($class, $message);
        self::check(is_a($value, $class, is_string($value)), $message, 'Failed to assert class relationship.');
    }

    public static function isNotA(mixed $value, mixed $class, string $message = ''): void
    {
        self::objectish($value, $message);
        self::string($class, $message);
        self::check(!is_a($value, $class, is_string($value)), $message, 'Failed to assert no class relationship.');
    }

    public static function isAnyOf(mixed $value, mixed $classes, string $message = ''): void
    {
        self::isIterable($classes, $message);
        foreach ($classes as $class) {
            if (is_string($class) && is_a($value, $class, is_string($value))) {
                return;
            }
        } self::fail($message, 'Failed to assert any class relationship.');
    }

    public static function uniqueValues(mixed $values, string $message = ''): void
    {
        self::isArray($values, $message);
        self::check(count($values) === count(array_unique($values)), $message, 'Failed to assert unique array values.');
    }

    public static function notFalse(mixed $value, string $message = ''): void
    {
        self::check($value !== false, $message, 'Failed to assert value is not false.');
    }

    public static function null(mixed $value, string $message = ''): void
    {
        self::check($value === null, $message, 'Failed to assert null.');
    }

    public static function isEmpty(mixed $value, string $message = ''): void
    {
        self::check(empty($value), $message, 'Failed to assert empty value.');
    }

    public static function notEmpty(mixed $value, string $message = ''): void
    {
        self::check(!empty($value), $message, 'Failed to assert non-empty value.');
    }

    public static function eq(mixed $value, mixed $expected, string $message = ''): void
    {
        self::check($value == $expected, $message, 'Failed to assert equal values.');
    }

    public static function notEq(mixed $value, mixed $expected, string $message = ''): void
    {
        self::check($value != $expected, $message, 'Failed to assert unequal values.');
    }

    public static function same(mixed $value, mixed $expected, string $message = ''): void
    {
        self::check($value === $expected, $message, 'Failed to assert identical values.');
    }

    public static function notSame(mixed $value, mixed $expected, string $message = ''): void
    {
        self::check($value !== $expected, $message, 'Failed to assert non-identical values.');
    }

    public static function greaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::check($value > $limit, $message, 'Failed to assert value is greater than limit.');
    }

    public static function greaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::check($value >= $limit, $message, 'Failed to assert value is greater than or equal to limit.');
    }

    public static function lessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::check($value < $limit, $message, 'Failed to assert value is less than limit.');
    }

    public static function lessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::check($value <= $limit, $message, 'Failed to assert value is less than or equal to limit.');
    }

    public static function range(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::check($value >= $min && $value <= $max, $message, 'Failed to assert value is in range.');
    }

    public static function inArray(mixed $value, mixed $values, string $message = ''): void
    {
        self::isArray($values, $message);
        self::check(in_array($value, $values, true), $message, 'Failed to assert value is in array.');
    }

    public static function notInArray(mixed $value, mixed $values, string $message = ''): void
    {
        self::isArray($values, $message);
        self::check(!in_array($value, $values, true), $message, 'Failed to assert value is not in array.');
    }

    public static function oneOf(mixed $value, mixed $values, string $message = ''): void
    {
        self::inArray($value, $values, $message);
    }

    public static function notOneOf(mixed $value, mixed $values, string $message = ''): void
    {
        self::notInArray($value, $values, $message);
    }

    public static function contains(mixed $value, mixed $substring, string $message = ''): void
    {
        self::string($value, $message);
        self::string($substring, $message);
        self::check(str_contains($value, $substring), $message, 'Failed to assert string contains substring.');
    }

    public static function notContains(mixed $value, mixed $substring, string $message = ''): void
    {
        self::string($value, $message);
        self::string($substring, $message);
        self::check(!str_contains($value, $substring), $message, 'Failed to assert string does not contain substring.');
    }

    public static function notWhitespaceOnly(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(preg_match('/\\S/', $value) === 1, $message, 'Failed to assert non-whitespace string.');
    }

    public static function startsWith(mixed $value, mixed $prefix, string $message = ''): void
    {
        self::string($value, $message);
        self::string($prefix, $message);
        self::check(str_starts_with($value, $prefix), $message, 'Failed to assert string prefix.');
    }

    public static function notStartsWith(mixed $value, mixed $prefix, string $message = ''): void
    {
        self::string($value, $message);
        self::string($prefix, $message);
        self::check(!str_starts_with($value, $prefix), $message, 'Failed to assert absent string prefix.');
    }

    public static function startsWithLetter(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(preg_match('/^\\p{L}/u', $value) === 1, $message, 'Failed to assert string starts with a letter.');
    }

    public static function endsWith(mixed $value, mixed $suffix, string $message = ''): void
    {
        self::string($value, $message);
        self::string($suffix, $message);
        self::check(str_ends_with($value, $suffix), $message, 'Failed to assert string suffix.');
    }

    public static function notEndsWith(mixed $value, mixed $suffix, string $message = ''): void
    {
        self::string($value, $message);
        self::string($suffix, $message);
        self::check(!str_ends_with($value, $suffix), $message, 'Failed to assert absent string suffix.');
    }

    public static function regex(mixed $value, mixed $pattern, string $message = ''): void
    {
        self::string($value, $message);
        self::string($pattern, $message);
        self::check(preg_match($pattern, $value) === 1, $message, 'Failed to assert string matches pattern.');
    }

    public static function notRegex(mixed $value, mixed $pattern, string $message = ''): void
    {
        self::string($value, $message);
        self::string($pattern, $message);
        self::check(preg_match($pattern, $value) !== 1, $message, 'Failed to assert string does not match pattern.');
    }

    public static function unicodeLetters(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(preg_match('/^\\p{L}+$/u', $value) === 1, $message, 'Failed to assert Unicode letters.');
    }

    public static function alpha(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(ctype_alpha($value), $message, 'Failed to assert alphabetic string.');
    }

    public static function digits(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(ctype_digit($value), $message, 'Failed to assert digit string.');
    }

    public static function alnum(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(ctype_alnum($value), $message, 'Failed to assert alphanumeric string.');
    }

    public static function lower(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(ctype_lower($value), $message, 'Failed to assert lowercase string.');
    }

    public static function upper(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(ctype_upper($value), $message, 'Failed to assert uppercase string.');
    }

    public static function length(mixed $value, mixed $length, string $message = ''): void
    {
        self::string($value, $message);
        self::integerish($length, $message);
        self::check(self::stringLength($value) === (int) $length, $message, 'Failed to assert string length.');
    }

    public static function minLength(mixed $value, mixed $min, string $message = ''): void
    {
        self::string($value, $message);
        self::integerish($min, $message);
        self::check(self::stringLength($value) >= (int) $min, $message, 'Failed to assert minimum string length.');
    }

    public static function maxLength(mixed $value, mixed $max, string $message = ''): void
    {
        self::string($value, $message);
        self::integerish($max, $message);
        self::check(self::stringLength($value) <= (int) $max, $message, 'Failed to assert maximum string length.');
    }

    public static function lengthBetween(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::string($value, $message);
        self::integerish($min, $message);
        self::integerish($max, $message);
        self::check(self::stringLength($value) >= (int) $min && self::stringLength($value) <= (int) $max, $message, 'Failed to assert string length range.');
    }

    public static function uuid(mixed $value, string $message = ''): void
    {
        self::string($value, $message);

        $uuid = '[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}';
        $valid = preg_match('/^' . $uuid . '$/D', $value) === 1
            || preg_match('/^urn:uuid:' . $uuid . '$/D', $value) === 1
            || preg_match('/^uuid:(?:' . $uuid . '|\{' . $uuid . '\})$/D', $value) === 1
            || preg_match('/^\{' . $uuid . '\}$/D', $value) === 1;

        self::check($valid, $message, 'Failed to assert UUID.');
    }

    public static function ip(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(filter_var($value, FILTER_VALIDATE_IP) !== false, $message, 'Failed to assert IP address.');
    }

    public static function ipv4(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false, $message, 'Failed to assert IPv4 address.');
    }

    public static function ipv6(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false, $message, 'Failed to assert IPv6 address.');
    }

    public static function email(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(filter_var($value, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE) !== false, $message, 'Failed to assert email address.');
    }

    public static function fileExists(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(file_exists($value), $message, 'Failed to assert existing path.');
    }

    public static function file(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(is_file($value), $message, 'Failed to assert file.');
    }

    public static function directory(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(is_dir($value), $message, 'Failed to assert directory.');
    }

    public static function readable(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(is_readable($value), $message, 'Failed to assert readable path.');
    }

    public static function writable(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(is_writable($value), $message, 'Failed to assert writable path.');
    }

    public static function classExists(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(class_exists($value), $message, 'Failed to assert existing class.');
    }

    public static function subclassOf(mixed $value, mixed $class, string $message = ''): void
    {
        self::string($value, $message);
        self::string($class, $message);
        self::check(is_subclass_of($value, $class), $message, 'Failed to assert subclass.');
    }

    public static function interfaceExists(mixed $value, string $message = ''): void
    {
        self::string($value, $message);
        self::check(interface_exists($value), $message, 'Failed to assert existing interface.');
    }

    public static function implementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::objectish($value, $message);
        self::string($interface, $message);
        self::check(in_array($interface, class_implements($value) ?: [], true), $message, 'Failed to assert implemented interface.');
    }

    public static function propertyExists(mixed $classOrObject, mixed $property, string $message = ''): void
    {
        self::objectish($classOrObject, $message);
        self::check(property_exists($classOrObject, $property), $message, 'Failed to assert existing property.');
    }

    public static function propertyNotExists(mixed $classOrObject, mixed $property, string $message = ''): void
    {
        self::objectish($classOrObject, $message);
        self::check(!property_exists($classOrObject, $property), $message, 'Failed to assert absent property.');
    }

    public static function methodExists(mixed $classOrObject, mixed $method, string $message = ''): void
    {
        self::objectish($classOrObject, $message);
        self::check(method_exists($classOrObject, $method), $message, 'Failed to assert existing method.');
    }

    public static function methodNotExists(mixed $classOrObject, mixed $method, string $message = ''): void
    {
        self::objectish($classOrObject, $message);
        self::check(!method_exists($classOrObject, $method), $message, 'Failed to assert absent method.');
    }

    public static function keyExists(mixed $array, string|int $key, string $message = ''): void
    {
        self::isArray($array, $message);
        self::check(array_key_exists($key, $array), $message, 'Failed to assert existing array key.');
    }

    public static function keyNotExists(mixed $array, string|int $key, string $message = ''): void
    {
        self::isArray($array, $message);
        self::check(!array_key_exists($key, $array), $message, 'Failed to assert absent array key.');
    }

    public static function validArrayKey(mixed $value, string $message = ''): void
    {
        self::check(is_int($value) || is_string($value), $message, 'Failed to assert valid array key.');
    }

    public static function count(mixed $array, mixed $number, string $message = ''): void
    {
        self::isCountable($array, $message);
        self::integerish($number, $message);
        self::check(count($array) === (int) $number, $message, 'Failed to assert count.');
    }

    public static function minCount(mixed $array, mixed $min, string $message = ''): void
    {
        self::isCountable($array, $message);
        self::integerish($min, $message);
        self::check(count($array) >= (int) $min, $message, 'Failed to assert minimum count.');
    }

    public static function maxCount(mixed $array, mixed $max, string $message = ''): void
    {
        self::isCountable($array, $message);
        self::integerish($max, $message);
        self::check(count($array) <= (int) $max, $message, 'Failed to assert maximum count.');
    }

    public static function countBetween(mixed $array, mixed $min, mixed $max, string $message = ''): void
    {
        self::isCountable($array, $message);
        self::integerish($min, $message);
        self::integerish($max, $message);
        self::check(count($array) >= (int) $min && count($array) <= (int) $max, $message, 'Failed to assert count range.');
    }

    public static function isList(mixed $array, string $message = ''): void
    {
        self::isArray($array, $message);
        self::check(array_is_list($array), $message, 'Failed to assert list.');
    }

    public static function isNonEmptyList(mixed $array, string $message = ''): void
    {
        self::isList($array, $message);
        self::notEmpty($array, $message);
    }

    public static function isMap(mixed $array, string $message = ''): void
    {
        self::isArray($array, $message);
        self::check($array === [] || !array_is_list($array), $message, 'Failed to assert map.');
    }

    public static function isNonEmptyMap(mixed $array, string $message = ''): void
    {
        self::isMap($array, $message);
    }

    public static function throws(mixed $closure, mixed $class, string $message = ''): void
    {
        self::check($closure instanceof Closure, $message, 'Failed to assert closure.');
        self::string($class, $message);

        try {
            $closure();
        } catch (Throwable $exception) {
            self::check($exception instanceof $class, $message, 'Failed to assert expected exception.');

            return;
        }

        self::fail($message, 'Failed to assert closure throws exception.');
    }

    public static function isStatic(mixed $closure, string $message = ''): void
    {
        self::check($closure instanceof Closure && (new ReflectionFunction($closure))->isStatic(), $message, 'Failed to assert static closure.');
    }

    public static function notStatic(mixed $closure, string $message = ''): void
    {
        self::check($closure instanceof Closure && !(new ReflectionFunction($closure))->isStatic(), $message, 'Failed to assert non-static closure.');
    }

    private static function check(bool $condition, string $message, string $defaultMessage): void
    {
        if (!$condition) {
            self::fail($message, $defaultMessage);
        }
    }

    private static function fail(string $message, string $defaultMessage): never
    {
        throw new AssertionFailedException($message !== '' ? $message : $defaultMessage);
    }

    private static function stringLength(string $value): int
    {
        return function_exists('mb_strlen') ? mb_strlen($value) : strlen($value);
    }

    /** @return array{string, bool, bool} */
    private static function parseVariant(string $name): array
    {
        return match (true) {
            str_starts_with($name, 'allNullOr') => [lcfirst(substr($name, 9)), true, true],
            str_starts_with($name, 'nullOr') => [lcfirst(substr($name, 6)), false, true],
            str_starts_with($name, 'all') => [lcfirst(substr($name, 3)), true, false],
            default => throw new BadMethodCallException("Undefined assertion method {$name}."),
        };
    }

    private static function assertVariantExists(string $name, string $method): void
    {
        if ($method === '' || !method_exists(self::class, $method)) {
            throw new BadMethodCallException("Undefined assertion method {$name}.");
        }
    }

    private static function assertAll(string $method, mixed $value, bool $nullable, array $arguments): void
    {
        self::isIterable($value);
        foreach ($value as $entry) {
            if (!$nullable || $entry !== null) {
                self::{$method}($entry, ...$arguments);
            }
        }
    }

    public static function __callStatic(string $name, array $arguments): void
    {
        [$method, $all, $nullable] = self::parseVariant($name);
        self::assertVariantExists($name, $method);

        $value = array_shift($arguments);

        if ($all) {
            self::assertAll($method, $value, $nullable, $arguments);

            return;
        }

        if (!$nullable || $value !== null) {
            self::{$method}($value, ...$arguments);
        }
    }
}
