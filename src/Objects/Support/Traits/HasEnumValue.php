<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use BackedEnum;
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
        if (!method_exists(static::class, "cases")) {
            throw new LogicException(sprintf(
                "The trait %s can only be used on enum classes",
                self::class
            ));
        }

        $cases = [];
        /** @var BackedEnum $case */
        foreach (static::cases() as $case) {
            $cases[] = $case->value;
        }

        return $cases;
    }
}