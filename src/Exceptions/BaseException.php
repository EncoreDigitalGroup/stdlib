<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Exception;
use Throwable;

/** @codeCoverageIgnore */
class BaseException extends Exception
{
    public function __construct(string $message = "Unknown Error Encountered", int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
