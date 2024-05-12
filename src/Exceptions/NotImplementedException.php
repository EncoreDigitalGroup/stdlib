<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class NotImplementedException extends BaseException
{
    public function __construct()
    {
        $msg = str_concat_space('Method is not implemented on line', $this->line, 'in', $this->file);

        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}
