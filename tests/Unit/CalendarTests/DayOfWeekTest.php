<?php
/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

use EncoreDigitalGroup\StdLib\Objects\Calendar\DayOfWeek;

describe("DayOfWeek Tests", function () {
    test("DayOfWeek enum values are correct", function () {
        expect(DayOfWeek::Sunday->value)->toBe("sunday")
            ->and(DayOfWeek::Monday->value)->toBe("monday")
            ->and(DayOfWeek::Tuesday->value)->toBe("tuesday")
            ->and(DayOfWeek::Wednesday->value)->toBe("wednesday")
            ->and(DayOfWeek::Thursday->value)->toBe("thursday")
            ->and(DayOfWeek::Friday->value)->toBe("friday")
            ->and(DayOfWeek::Saturday->value)->toBe("saturday");
    });

    test("DayOfWeek toInt returns correct zero-based values", function () {
        expect(DayOfWeek::Sunday->toInt())->toBe(0)
            ->and(DayOfWeek::Monday->toInt())->toBe(1)
            ->and(DayOfWeek::Tuesday->toInt())->toBe(2)
            ->and(DayOfWeek::Wednesday->toInt())->toBe(3)
            ->and(DayOfWeek::Thursday->toInt())->toBe(4)
            ->and(DayOfWeek::Friday->toInt())->toBe(5)
            ->and(DayOfWeek::Saturday->toInt())->toBe(6);
    });

    test("DayOfWeek toInt returns correct one-based values", function () {
        expect(DayOfWeek::Sunday->toInt(false))->toBe(1)
            ->and(DayOfWeek::Monday->toInt(false))->toBe(2)
            ->and(DayOfWeek::Tuesday->toInt(false))->toBe(3)
            ->and(DayOfWeek::Wednesday->toInt(false))->toBe(4)
            ->and(DayOfWeek::Thursday->toInt(false))->toBe(5)
            ->and(DayOfWeek::Friday->toInt(false))->toBe(6)
            ->and(DayOfWeek::Saturday->toInt(false))->toBe(7);
    });

    test("DayOfWeek fromInt returns correct enum for zero-based values", function () {
        expect(DayOfWeek::fromInt(0))->toBe(DayOfWeek::Sunday)
            ->and(DayOfWeek::fromInt(1))->toBe(DayOfWeek::Monday)
            ->and(DayOfWeek::fromInt(2))->toBe(DayOfWeek::Tuesday)
            ->and(DayOfWeek::fromInt(3))->toBe(DayOfWeek::Wednesday)
            ->and(DayOfWeek::fromInt(4))->toBe(DayOfWeek::Thursday)
            ->and(DayOfWeek::fromInt(5))->toBe(DayOfWeek::Friday)
            ->and(DayOfWeek::fromInt(6))->toBe(DayOfWeek::Saturday);
    });

    test("DayOfWeek fromInt returns correct enum for one-based values", function () {
        expect(DayOfWeek::fromInt(1, false))->toBe(DayOfWeek::Sunday)
            ->and(DayOfWeek::fromInt(2, false))->toBe(DayOfWeek::Monday)
            ->and(DayOfWeek::fromInt(3, false))->toBe(DayOfWeek::Tuesday)
            ->and(DayOfWeek::fromInt(4, false))->toBe(DayOfWeek::Wednesday)
            ->and(DayOfWeek::fromInt(5, false))->toBe(DayOfWeek::Thursday)
            ->and(DayOfWeek::fromInt(6, false))->toBe(DayOfWeek::Friday)
            ->and(DayOfWeek::fromInt(7, false))->toBe(DayOfWeek::Saturday);
    });

    test("DayOfWeek fromInt returns null for invalid values", function () {
        expect(DayOfWeek::fromInt(-1))->toBeNull()
            ->and(DayOfWeek::fromInt(7))->toBeNull()
            ->and(DayOfWeek::fromInt(100))->toBeNull()
            ->and(DayOfWeek::fromInt(0, false))->toBeNull()
            ->and(DayOfWeek::fromInt(8, false))->toBeNull();
    });
});

