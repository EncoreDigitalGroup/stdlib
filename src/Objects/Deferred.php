<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use function Illuminate\Support\defer;

use Illuminate\Support\Defer\DeferredCallback;

/** @codeCoverageIgnore Ignored since this is a wrapper around an Illuminate class */
class Deferred
{
    public static function handle(?callable $callback = null, ?string $name = null, bool $always = false): DeferredCallback
    {
        return defer($callback, $name, $always);
    }
}