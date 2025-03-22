<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use BackedEnum;
use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;
use LogicException;

/**
 * Trait for PHP Enums that provides additional functionality.
 * This trait should only be used on Enum classes.
 *
 * @method static static[] cases() Returns all cases of the Enum
 */
trait HasEnumValue
{
    public static function values(): array
    {
        static::enforceEnum();

        $cases = [];
        /** @var BackedEnum $case */
        foreach (static::cases() as $case) {
            $cases[] = $case->value;
        }

        return $cases;
    }

    public static function titleCasedValues(): array
    {
        static::enforceEnum();

        $cases = [];
        /** @var BackedEnum $case */
        foreach (static::cases() as $case) {
            if (is_string($case->value)) {
                $cases[$case->value] = Str::title($case->value);
            }
        }

        return $cases;
    }

    private static function enforceEnum(): void
    {
        if (!method_exists(static::class, "cases")) {
            throw new LogicException(sprintf(
                "The trait %s can only be used on enum classes",
                self::class
            ));
        }
    }
}