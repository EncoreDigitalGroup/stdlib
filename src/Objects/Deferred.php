<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\MissingMinimumDependencyException;
use EncoreDigitalGroup\StdLib\Support\Internal\Composer\Composer;

use function Illuminate\Support\defer;

use Illuminate\Support\Defer\DeferredCallback;
use Illuminate\Support\Defer\DeferredCallbackCollection;

/**
 * @codeCoverageIgnore Ignored since this is a wrapper around an Illuminate class
 *
 * @deprecated Use defer() function instead.
 */
class Deferred
{
    public static function handle(?callable $callback = null, ?string $name = null, bool $always = false): DeferredCallback|DeferredCallbackCollection
    {
        if (version_compare(Composer::version(Composer::ILLUMINATE_SUPPORT), "11.24.0", "<")) {
            throw new MissingMinimumDependencyException(Composer::ILLUMINATE_SUPPORT);
        }

        return defer($callback, $name, $always);
    }
}