<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

use BackedEnum;

class StaticCache
{

    private static array $cache = [];

    public static function add(BackedEnum|string $key, mixed $value, BackedEnum|string $partition = "default"): void
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        self::$cache[$partition][$key] = $value;
    }

    public static function contains(BackedEnum|string $key, BackedEnum|string $partition = "default"): bool
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        return isset(self::$cache[$partition][$key]);
    }

    public static function get(BackedEnum|string $key, BackedEnum|string $partition = "default"): mixed
    {
        $key = self::enum($key);
        $partition = self::enum($partition);

        if (self::contains($key, $partition)) {
            return self::$cache[$partition][$key];
        }

        return null;
    }

    private static function enum(BackedEnum|string $name): string
    {
        if ($name instanceof BackedEnum) {
            $name = $name->value;
        }

        if (!is_string($name)) {
            $name = (string)$name;
        }

        return $name;
    }
}