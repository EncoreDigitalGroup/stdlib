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
    function enum_string(UnitEnum $enum): string
    {
        if ($enum instanceof IntBackedEnum) {
            throw new InvalidArgumentException("IntBackedEnum Prohibited.");
        }

        return $enum->name;
    }
}

if (!function_exists('enum_int')) {
    function enum_int(UnitEnum $enum): string
    {
        if ($enum instanceof StringBackedEnum) {
            throw new InvalidArgumentException("StringBackEnum Prohibited.");
        }

        return $enum->name;
    }
}
