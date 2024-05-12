<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;
use Exception;
use Throwable;

class BaseException extends Exception
{
    public function __construct(string $message = 'Unknown Error Encountered', int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
