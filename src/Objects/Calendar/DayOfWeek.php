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