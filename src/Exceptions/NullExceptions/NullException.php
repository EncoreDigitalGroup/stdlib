<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\NullExceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class NullException extends BaseException
{
    public function __construct(string $arg)
    {
        $msg = "{$argumentName} cannot be null.";

        parent::__construct($msg, ExitCode::DATA_ERROR, $this->getPrevious());
    }
}
