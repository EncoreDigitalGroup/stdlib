<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;
use EncoreDigitalGroup\StdLib\Objects\Support\Traits\Assertable;

function expectsString(string $value): void {}

function expectsObject(object $value): void {}

function expectsInteger(int $value): void {}

function expectsStdClass(stdClass $value): void {}

class AssertableFixture
{
    use Assertable;

    public function assertIntegerType(mixed $value): void
    {
        $this->assertInteger($value);
        expectsInteger($value);
    }

    public function assertInstanceType(mixed $value): void
    {
        $this->assertIsInstanceOf($value, stdClass::class);
        expectsStdClass($value);
    }

    public function assertAnyInstanceType(mixed $value): void
    {
        $this->assertIsInstanceOfAny($value, [stdClass::class]);
        expectsStdClass($value);
    }
}

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
