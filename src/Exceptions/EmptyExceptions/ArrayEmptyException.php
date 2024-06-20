<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\EmptyExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class ArrayEmptyException extends BaseException
{
    public function __construct(string $arrayName = 'Array')
    {
        $msg = "{$arrayName} cannot be an empty array.";

        parent::__construct($msg, ExitCode::GENERAL_ERROR, $this->getPrevious());
    }
}
