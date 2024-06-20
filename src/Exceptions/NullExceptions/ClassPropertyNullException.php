<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\NullExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class ClassPropertyNullException extends BaseException
{
    public function __construct(string $propertyName = 'Property')
    {
        $msg = "{$propertyName} cannot be null.";

        parent::__construct($msg, ExitCode::GENERAL_ERROR, $this->getPrevious());
    }
}
