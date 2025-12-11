<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Calendar;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum DayOfWeek: string
{
    use HasEnumValue;

    case Sunday = "sunday";
    case Monday = "monday";
    case Tuesday = "tuesday";
    case Wednesday = "wednesday";
    case Thursday = "thursday";
    case Friday = "friday";
    case Saturday = "saturday";

    public static function fromInt(int $int, bool $zero = true): ?self
    {
        if ($zero) {
            return match ($int) {
                0 => self::Sunday,
                1 => self::Monday,
                2 => self::Tuesday,
                3 => self::Wednesday,
                4 => self::Thursday,
                5 => self::Friday,
                6 => self::Saturday,
                default => null,
            };
        }

        return match ($int) {
            1 => self::Sunday,
            2 => self::Monday,
            3 => self::Tuesday,
            4 => self::Wednesday,
            5 => self::Thursday,
            6 => self::Friday,
            7 => self::Saturday,
            default => null,
        };
    }

    public function toInt(bool $zero = true): int
    {
        $int = match ($this->value) {
            self::Sunday->value => 0,
            self::Monday->value => 1,
            self::Tuesday->value => 2,
            self::Wednesday->value => 3,
            self::Thursday->value => 4,
            self::Friday->value => 5,
            self::Saturday->value => 6,
        };

        if (!$zero) {
            $int++;
        }

        return $int;
    }
}