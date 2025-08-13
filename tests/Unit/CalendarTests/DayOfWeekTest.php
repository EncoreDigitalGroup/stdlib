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
});

