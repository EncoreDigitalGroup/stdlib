<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

use EncoreDigitalGroup\StdLib\Objects\Support\Assert;

trait Assertable
{
    /**
     * @phpstan-assert true $value
     */
    protected function assertTrue(mixed $value): void
    {
        Assert::true($value);
    }

    /**
     * @phpstan-assert false $value
     */
    protected function assertFalse(mixed $value): void
    {
        Assert::false($value);
    }

    /**
     * @phpstan-assert !null $value
     */
    protected function assertNotNull(mixed $value): void
    {
        Assert::notNull($value);
    }
}