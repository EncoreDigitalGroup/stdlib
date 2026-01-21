<?php


namespace EncoreDigitalGroup\StdLib\Objects\Support;

use Closure;
use EncoreDigitalGroup\StdLib\Exceptions\LockTimeoutException;
use Illuminate\Support\Sleep;

class Lock
{
    /** @var array<string, bool> */
    private static array $locks = [];

    /**
     * Execute a callback while holding a named lock
     *
     * @template T
     *
     * @param string $name The name of the lock to acquire
     * @param int $timeout Maximum number of seconds to wait for the lock
     * @param Closure(): T $callback The callback to execute while holding the lock
     * @return T
     */
    public static function block(string $name, int $timeout, Closure $callback): mixed
    {
        self::acquire($name, $timeout);

        try {
            return $callback();
        } finally {
            self::release($name);
        }
    }

    private static function acquire(string $name, int $timeout): void
    {
        $attempts = 0;

        while (self::isLocked($name) && $attempts < $timeout) {
            Sleep::for(1)->seconds();
            $attempts++;
        }

        if (self::isLocked($name)) {
            throw new LockTimeoutException($name, $timeout);
        }

        self::$locks[$name] = true;
    }

    private static function release(string $name): void
    {
        unset(self::$locks[$name]);
    }

    private static function isLocked(string $name): bool
    {
        return self::$locks[$name] ?? false;
    }
}