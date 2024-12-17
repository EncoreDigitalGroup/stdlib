<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use Illuminate\Support\Defer\DeferredCallback;
use function Illuminate\Support\defer;

class Deferred
{
    public static function handle(?callable $callback = null, ?string $name = null, bool $always = false): DeferredCallback
    {
        return defer($callback, $name, $always);
    }
}