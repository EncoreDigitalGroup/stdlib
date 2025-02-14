<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\NullExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;

/** @codeCoverageIgnore */
class VariableNullException extends BaseException
{
    public function __construct(string $variableName = "Variable")
    {
        $msg = "{$variableName} cannot be null.";

        parent::__construct($msg, ExitCode::GENERAL_ERROR, $this->getPrevious());
    }
}
