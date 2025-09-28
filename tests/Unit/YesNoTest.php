<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Enums\YesNo;

describe("YesNo Tests", function (): void {
    describe("YesNo enum toBoolean method", function () {
        test("Yes case returns true", function () {
            expect(YesNo::Yes->toBoolean())->toBeTrue();
        });

        test("No case returns false", function () {
            expect(YesNo::No->toBoolean())->toBeFalse();
        });
    });

    describe("YesNo enum basic functionality", function () {
        test("enum cases have correct string values", function () {
            expect(YesNo::Yes->value)->toBe("yes")
                ->and(YesNo::No->value)->toBe("no");
        });

        test("enum can be compared for equality", function () {
            expect(YesNo::Yes === YesNo::Yes)->toBeTrue()
                ->and(YesNo::No === YesNo::No)->toBeTrue()
                ->and(YesNo::Yes === YesNo::No)->toBeFalse()
                ->and(YesNo::No === YesNo::Yes)->toBeFalse();
        });
    });

    describe("YesNo enum from string to boolean", function () {
        test("from string creates correct enum cases", function () {
            expect(YesNo::from("yes")->toBoolean())->toBeTrue()
                ->and(YesNo::from("no")->toBoolean())->toBeFalse();
        });

        test("from string throws ValueError for invalid values", function () {
            expect(fn() => YesNo::from("invalid"))->toThrow(ValueError::class);
        });
    });
});