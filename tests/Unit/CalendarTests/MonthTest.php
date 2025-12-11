<?php
/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

use EncoreDigitalGroup\StdLib\Objects\Calendar\Month;

describe("Month Tests", function () {
    it("next() returns the correct next month for each month", function () {
        expect(Month::January->next())->toBe(Month::February)
            ->and(Month::February->next())->toBe(Month::March)
            ->and(Month::March->next())->toBe(Month::April)
            ->and(Month::April->next())->toBe(Month::May)
            ->and(Month::May->next())->toBe(Month::June)
            ->and(Month::June->next())->toBe(Month::July)
            ->and(Month::July->next())->toBe(Month::August)
            ->and(Month::August->next())->toBe(Month::September)
            ->and(Month::September->next())->toBe(Month::October)
            ->and(Month::October->next())->toBe(Month::November)
            ->and(Month::November->next())->toBe(Month::December)
            ->and(Month::December->next())->toBe(Month::January);
    });

    it("previous() returns the correct previous month for each month", function () {
        expect(Month::January->previous())->toBe(Month::December)
            ->and(Month::February->previous())->toBe(Month::January)
            ->and(Month::March->previous())->toBe(Month::February)
            ->and(Month::April->previous())->toBe(Month::March)
            ->and(Month::May->previous())->toBe(Month::April)
            ->and(Month::June->previous())->toBe(Month::May)
            ->and(Month::July->previous())->toBe(Month::June)
            ->and(Month::August->previous())->toBe(Month::July)
            ->and(Month::September->previous())->toBe(Month::August)
            ->and(Month::October->previous())->toBe(Month::September)
            ->and(Month::November->previous())->toBe(Month::October)
            ->and(Month::December->previous())->toBe(Month::November);
    });

    it("toInt() returns the correct integer value for each month", function () {
        expect(Month::January->toInt())->toBe(1)
            ->and(Month::February->toInt())->toBe(2)
            ->and(Month::March->toInt())->toBe(3)
            ->and(Month::April->toInt())->toBe(4)
            ->and(Month::May->toInt())->toBe(5)
            ->and(Month::June->toInt())->toBe(6)
            ->and(Month::July->toInt())->toBe(7)
            ->and(Month::August->toInt())->toBe(8)
            ->and(Month::September->toInt())->toBe(9)
            ->and(Month::October->toInt())->toBe(10)
            ->and(Month::November->toInt())->toBe(11)
            ->and(Month::December->toInt())->toBe(12);
    });

    test("Month fromInt returns correct enum for valid values", function () {
        expect(Month::fromInt(1))->toBe(Month::January)
            ->and(Month::fromInt(2))->toBe(Month::February)
            ->and(Month::fromInt(3))->toBe(Month::March)
            ->and(Month::fromInt(4))->toBe(Month::April)
            ->and(Month::fromInt(5))->toBe(Month::May)
            ->and(Month::fromInt(6))->toBe(Month::June)
            ->and(Month::fromInt(7))->toBe(Month::July)
            ->and(Month::fromInt(8))->toBe(Month::August)
            ->and(Month::fromInt(9))->toBe(Month::September)
            ->and(Month::fromInt(10))->toBe(Month::October)
            ->and(Month::fromInt(11))->toBe(Month::November)
            ->and(Month::fromInt(12))->toBe(Month::December);
    });

    test("Month fromInt returns null for invalid values", function () {
        expect(Month::fromInt(0))->toBeNull()
            ->and(Month::fromInt(13))->toBeNull()
            ->and(Month::fromInt(-1))->toBeNull()
            ->and(Month::fromInt(100))->toBeNull();
    });
});
