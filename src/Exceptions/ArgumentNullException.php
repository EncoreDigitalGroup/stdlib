<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Exceptions\NullExceptions\ArgumentNullException as BaseArgumentNullException;
use EncoreDigitalGroup\StdLib\Objects\ExitCode;

/** @deprecated use EncoreDigitalGroup\StdLib\Exceptions\NullExceptions\ArgumentNullException instead */
class ArgumentNullException extends BaseArgumentNullException
{
    public function __construct(string $argumentName = 'Argument')
    {
        parent::__construct($argumentName);
    }
}
