<?php

if (!function_exists('enum')) {
    function enum(UnitEnum $enum): int|string
    {
        if ($enum instanceof BackedEnum) {
            return $enum->value;
        }

        return $enum->name;
    }
}

if (!function_exists('enum_string')) {
    function enum_string(BackedEnum $enum): string
    {
        if (is_int($enum->value)) {
            throw new InvalidArgumentException('IntBackedEnum Prohibited.');
        }

        return $enum->value;
    }
}

if (!function_exists('enum_int')) {
    function enum_int(BackedEnum $enum): string
    {
        if (is_string($enum->value)) {
            throw new InvalidArgumentException('StringBackEnum Prohibited.');
        }

        return $enum->value;
    }
}
