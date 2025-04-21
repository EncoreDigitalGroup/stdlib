<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Traits;

/** @internal */
trait StaticCacheEnabled
{
    protected const string ENABLED = "enabled";

    protected static array $enabled = [];

    public static function enable(): void
    {
        static::$enabled[static::class][self::ENABLED] = true;
    }

    public static function disable(bool $flush = true): void
    {
        if ($flush) {
            static::flush();
        }

        static::$enabled[static::class][self::ENABLED] = false;
    }

    protected static function enabled(): bool
    {
        if (!isset(static::$enabled[static::class][self::ENABLED])) {
            static::$enabled[static::class][self::ENABLED] = true;
        }

        return static::$enabled[static::class][self::ENABLED];
    }

    protected static function disabled(): bool
    {
        return !static::enabled();
    }
}