<?php

use EncoreDigitalGroup\StdLib\Exceptions\AssertionFailedException;
use EncoreDigitalGroup\StdLib\Objects\Support\Assert;

test("assertions support Webmozart base assertion categories", function (): void {
    Assert::integer(1);
    Assert::same("value", "value");
    Assert::contains("value", "alu");
    Assert::file(__FILE__);
    Assert::classExists(Assert::class);
    Assert::keyExists(["key" => "value"], "key");
    Assert::throws(static fn () => throw new RuntimeException, RuntimeException::class);

    expect(true)->toBeTrue();
});

test("assertions reject invalid values with the local exception type", function (): void {
    Assert::integer("not an integer");
})->throws(AssertionFailedException::class);

test("nullable and iterable assertion variants validate their values", function (): void {
    Assert::nullOrString(null);
    Assert::allInteger([1, 2, 3]);
    Assert::allNullOrString(["first", null, "last"]);

    expect(true)->toBeTrue();
});

test("nullable and iterable assertion variants reject invalid values", function (): void {
    Assert::allNullOrString(["valid", 1]);
})->throws(AssertionFailedException::class);
