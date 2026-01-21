<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class AssertionFailedException extends BaseException
{
    public function __construct(string $message = "Assertion Failed", int $code = ExitCode::GENERAL_ERROR, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}