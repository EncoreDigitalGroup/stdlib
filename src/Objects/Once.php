<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use Illuminate\Support\Once as BaseOnce;

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