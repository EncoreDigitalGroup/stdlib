<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\NullExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;

class NullException extends BaseException
{
    public function __construct(string $arg)
    {
        $msg = "{$arg} cannot be null.";

        parent::__construct($msg, ExitCode::DATA_ERROR, $this->getPrevious());
    }
}
