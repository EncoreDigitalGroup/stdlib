<?php

namespace EncoreDigitalGroup\StdLib\Support\Internal\Assertions;

final class AssertTypeMetadata
{
    public static function phpStanAssertion(string $method): ?string
    {
        return match ($method) {
            "string", "stringNotEmpty", "contains", "notContains", "notWhitespaceOnly", "startsWith", "notStartsWith",
            "startsWithLetter", "endsWith", "notEndsWith", "regex", "notRegex", "unicodeLetters", "alpha", "digits",
            "alnum", "lower", "upper", "length", "minLength", "maxLength", "lengthBetween", "uuid", "ip", "ipv4", "ipv6",
            "email", "fileExists", "file", "directory", "readable", "writable", "classExists", "interfaceExists" => "string",
            "integer", "positiveInteger", "negativeInteger", "notNegativeInteger", "natural" => "int",
            "float" => "float",
            "boolean" => "bool",
            "true" => "true",
            "false" => "false",
            "null" => "null",
            "notNull" => "!null",
            "notFalse" => "!false",
            "resource" => "resource",
            "object", "isInstanceOf", "isInstanceOfAny" => "object",
            "objectish", "isAOf", "isAnyOf" => "object|string",
            "isArray", "isList", "isNonEmptyList", "isMap", "isNonEmptyMap" => "array",
            "isIterable" => "iterable",
            "isCountable" => "array|Countable",
            "scalar" => "scalar",
            "numeric", "integerish" => "int|float|string",
            default => null,
        };
    }
}
