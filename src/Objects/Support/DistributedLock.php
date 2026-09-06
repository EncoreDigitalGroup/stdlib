<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support;

use Closure;
use EncoreDigitalGroup\StdLib\Exceptions\MissingDependencyException;
use EncoreDigitalGroup\StdLib\Support\Internal\Composer\Composer;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Support\Facades\Cache;

abstract class DistributedLock
{
    protected int $ttlSeconds = 30;

    protected int $blockSeconds = 0;

    private function __construct(private readonly string $name)
    {
        if (!Composer::installed(Composer::ILLUMINATE_SUPPORT)) {
            throw new MissingDependencyException(Composer::ILLUMINATE_SUPPORT);
        }
    }

    abstract public static function scope(int|string $scope): static;

    protected static function named(string $name): static
    {
        return new static($name);
    }

    public function withTtlSeconds(int $ttlSeconds): static
    {
        $this->ttlSeconds = $ttlSeconds;

        return $this;
    }

    public function withBlockSeconds(int $blockSeconds): static
    {
        $this->blockSeconds = $blockSeconds;

        return $this;
    }

    /**
     * @template T
     *
     * @param Closure(): T $callback
     * @return T
     * @throws LockTimeoutException
     */
    public function execute(Closure $callback): mixed
    {
        return Cache::lock($this->name, $this->ttlSeconds)
            ->block($this->blockSeconds, $callback);
    }
}
