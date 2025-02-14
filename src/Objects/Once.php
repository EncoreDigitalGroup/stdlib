<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use Illuminate\Support\Once as BaseOnce;

/** @codeCoverageIgnore Ignored since this is a wrapper around an Illuminate class */
class Once
{
    public static function handle(callable $callable): mixed
    {
        return once($callable);
    }

    public static function flush(): void
    {
        BaseOnce::instance()->flush();
    }
}