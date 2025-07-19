<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\ClassExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class InvalidClassException extends BaseException
{
    public function __construct(?string $message = null, int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = "Class does not exist";
        }

        if (!class_exists($message)) {
            $message .= " does not exist.";
        }

        parent::__construct($message, $code, $previous);
    }
}