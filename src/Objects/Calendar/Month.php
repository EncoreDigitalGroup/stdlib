<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Calendar;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum Month: string
{
    use HasEnumValue;

    case January = "january";
    case February = "february";
    case March = "march";
    case April = "april";
    case May = "may";
    case June = "june";
    case July = "july";
    case August = "august";
    case September = "september";
    case October = "october";
    case November = "november";
    case December = "december";

    public static function fromInt(int $int): ?self
    {
        return match ($int) {
            1 => self::January,
            2 => self::February,
            3 => self::March,
            4 => self::April,
            5 => self::May,
            6 => self::June,
            7 => self::July,
            8 => self::August,
            9 => self::September,
            10 => self::October,
            11 => self::November,
            12 => self::December,
            default => null,
        };
    }

    public function toInt(): int
    {
        return match ($this) {
            self::January => 1,
            self::February => 2,
            self::March => 3,
            self::April => 4,
            self::May => 5,
            self::June => 6,
            self::July => 7,
            self::August => 8,
            self::September => 9,
            self::October => 10,
            self::November => 11,
            self::December => 12,
        };
    }

    public function next(): self
    {
        return match ($this) {
            self::January => self::February,
            self::February => self::March,
            self::March => self::April,
            self::April => self::May,
            self::May => self::June,
            self::June => self::July,
            self::July => self::August,
            self::August => self::September,
            self::September => self::October,
            self::October => self::November,
            self::November => self::December,
            self::December => self::January,
        };
    }

    public function previous(): self
    {
        return match ($this) {
            self::January => self::December,
            self::February => self::January,
            self::March => self::February,
            self::April => self::March,
            self::May => self::April,
            self::June => self::May,
            self::July => self::June,
            self::August => self::July,
            self::September => self::August,
            self::October => self::September,
            self::November => self::October,
            self::December => self::November,
        };
    }
}