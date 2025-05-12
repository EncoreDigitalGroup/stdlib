<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\MissingMinimumDependencyException;
use EncoreDigitalGroup\StdLib\Support\Internal\Composer\Composer;

use function Illuminate\Support\defer;

use Illuminate\Support\Defer\DeferredCallback;

/** @codeCoverageIgnore Ignored since this is a wrapper around an Illuminate class */
class Deferred
{
    public static function handle(?callable $callback = null, ?string $name = null, bool $always = false): DeferredCallback
    {
        if (version_compare(Composer::version(Composer::ILLUMINATE_SUPPORT), "11.24.0", "<")) {
            throw new MissingMinimumDependencyException(Composer::ILLUMINATE_SUPPORT);
        }

        return defer($callback, $name, $always);
    }
}