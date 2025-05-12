<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;
use Throwable;

class MissingMinimumDependencyException extends BaseException
{
    /** @param ?string $message The name of the dependency that is missing. Leaving this null will return a general message. */
    public function __construct(?string $message = null, int $code = ExitCode::SUCCESS, ?Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = "Dependency minimum version constraint not met.";
        } else {
            $message = "The minimum version constraint for dependency {$message} has not been met.";
        }

        parent::__construct($message, $code, $previous);
    }
}