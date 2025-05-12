<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class MissingDependencyException extends BaseException
{
    /** @param ?string $message The name of the dependency that is missing. Leaving this null will return a general message. */
    public function __construct(?string $message = null, int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = "Dependency is missing.";
        } else {
            $message = "The dependency {$message} is missing";
        }

        parent::__construct($message, $code, $previous);
    }
}