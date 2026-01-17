<?php

/*
 * Copyright (c) 2026. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class LockTimeoutException extends BaseException
{
    public function __construct(string $lockName, int $timeout, ?Throwable $previous = null)
    {
        parent::__construct(
            "Failed to acquire lock '{$lockName}' within {$timeout} second(s)",
            ExitCode::GENERAL_ERROR,
            $previous
        );
    }
}