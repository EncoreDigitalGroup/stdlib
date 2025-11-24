<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class AssertionFailedException extends BaseException
{
    public function __construct(string $message = "Assertion Failed", int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}