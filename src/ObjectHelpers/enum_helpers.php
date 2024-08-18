<?php

if (!function_exists('enum')) {
    function enum(UnitEnum $enum): string|int
    {
        if ($enum instanceof BackedEnum) {
            return $enum->value;
        }

        return $enum->name;

    }
}
