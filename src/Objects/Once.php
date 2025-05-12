<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\MissingMinimumDependencyException;
use EncoreDigitalGroup\StdLib\Support\Internal\Composer\Composer;
use Illuminate\Support\Once as BaseOnce;

/** @codeCoverageIgnore Ignored since this is a wrapper around an Illuminate class */
class Once
{
    public static function handle(callable $callable): mixed
    {
        self::version();

        return once($callable);
    }

    public static function flush(): void
    {
        self::version();

        BaseOnce::instance()->flush();
    }

    private static function version(): void
    {
        if (version_compare(Composer::version(Composer::ILLUMINATE_SUPPORT), "11.0.0", "<")) {
            throw new MissingMinimumDependencyException(Composer::ILLUMINATE_SUPPORT);
        }
    }
}