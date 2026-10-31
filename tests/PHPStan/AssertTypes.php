<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;

function expectsString(string $value): void {}

function expectsObject(object $value): void {}

function assertTypes(mixed $value, mixed $nullable, mixed $nullableString, array $values): void
{
    Assert::string($value);
    expectsString($value);

    Assert::notNull($nullable);
    Assert::isInstanceOf($nullable, stdClass::class);
    expectsObject($nullable);

    Assert::nullOrString($nullableString);
    if ($nullableString !== null) {
        expectsString($nullableString);
    }

    if ($values !== []) {
        Assert::allString($values);
        expectsString($values[0]);
    }
}
