<?php

/*
 * Copyright (c) 2026. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use BackedEnum;
use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;
use LogicException;
use RuntimeException;

/**
 * Trait for PHP Enums that provides additional functionality.
 * This trait should only be used on Enum classes.
 *
 * @mixin BackedEnum
 */
trait HasEnumValue
{
    /** @deprecated use static::options() instead. */
    public static function values(): array
    {
        static::enforceEnum();

        $cases = [];
        foreach (static::cases() as $backedEnum) {
            $cases[] = $backedEnum->value;
        }

        return $cases;
    }

    public static function titleCasedValues(): array
    {
        static::enforceEnum();

        $cases = [];
        foreach (static::cases() as $backedEnum) {
            if (is_string($backedEnum->value)) {
                $cases[$backedEnum->value] = Str::formattedTitleCase($backedEnum->value);
            }
        }

        return $cases;
    }

    public static function from(int|string $value): ?static
    {
        static::enforceEnum();

        foreach (static::cases() as $backedEnum) {
            if ($backedEnum->value === $value) {
                return $backedEnum;
            }
        }

        return null;
    }

    public static function options(array $include = [], array $exclude = []): array
    {
        if ($include != []) {
            return self::optionsIncluding($include);
        }

        if ($exclude != []) {
            return self::optionsExcluding($exclude);
        }

        $options = [];

        foreach (self::cases() as $backedEnum) {
            $options[$backedEnum->value] = self::name($backedEnum);
        }

        return $options;
    }

    public static function name(self $self): string
    {
        $name = Str::formattedTitleCase($self->value);

        if (is_array($name)) {
            throw new RuntimeException("Name was provided as a string but returned as an array.");
        }

        return $name;
    }

    private static function enforceEnum(): void
    {
        /** @phpstan-ignore-next-line Runtime safety check */
        if (!method_exists(static::class, "cases")) {
            throw new LogicException(sprintf(
                "The trait %s can only be used on enum classes",
                self::class
            ));
        }
    }

    private static function optionsIncluding(array $include): array
    {
        $options = [];

        foreach (self::cases() as $backedEnum) {
            if (in_array($backedEnum, $include)) {
                $options[$backedEnum->value] = self::name($backedEnum);
            }
        }

        return $options;
    }

    private static function optionsExcluding(array $exclude): array
    {
        $options = [];

        foreach (self::cases() as $backedEnum) {
            if (!in_array($backedEnum, $exclude)) {
                $options[$backedEnum->value] = self::name($backedEnum);
            }
        }

        return $options;
    }
}