<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

use BackedEnum;
use Closure;
use EncoreDigitalGroup\StdLib\Objects\Support\Traits\StaticCacheEnabled;

class StaticCache
{
    use StaticCacheEnabled;

    protected static array $cache = [];

    public static function add(BackedEnum|string $key, mixed $value, BackedEnum|string $partition = "default"): void
    {
        if (self::disabled()) {
            return;
        }

        $key = self::enum($key);
        $partition = self::enum($partition);

        self::$cache[static::class][$partition][$key] = $value;
    }

    public static function contains(BackedEnum|string $key, BackedEnum|string $partition = "default"): bool
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        return isset(self::$cache[static::class][$partition][$key]);
    }

    public static function get(BackedEnum|string $key, BackedEnum|string $partition = "default"): mixed
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        if (self::contains($key, $partition)) {
            return self::$cache[static::class][$partition][$key];
        }

        return null;
    }

    public static function remove(BackedEnum|string $key, BackedEnum|string $partition = "default"): void
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        unset(self::$cache[static::class][$partition][$key]);
    }

    public static function flush(BackedEnum|string|null $partition = null): void
    {
        if (is_null($partition)) {
            self::$cache[static::class] = [];

            return;
        }

        $partition = self::enum($partition);

        if (isset(self::$cache[$partition])) {
            self::$cache[static::class][$partition] = [];
        }
    }

    public static function remember(BackedEnum|string $key, Closure $value, BackedEnum|string $partition = "default"): mixed
    {
        if (self::disabled()) {
            return $value();
        }

        $partition = self::enum($partition);

        if (self::contains($key, $partition)) {
            return self::get($key, $partition);
        }

        $result = $value();
        self::add($key, $result, $partition);

        return $result;
    }

    protected static function enum(BackedEnum|string $name): string
    {
        if ($name instanceof BackedEnum) {
            $name = $name->value;
        }

        if (!is_string($name)) {
            return (string) $name;
        }

        return $name;
    }
}
