<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class ArgumentNullException extends BaseException
{
    public function __construct(string $argumentName = 'Argument')
    {
        $msg = "{$argumentName} is null on {$this->line}, in {$this->file}";

        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}
