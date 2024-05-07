<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class FileNotFoundException extends BaseException
{
    public function __construct(string $path = null)
    {
        if (is_null($path)) {
            $msg = str_concat_space('Unable to locate file on line', $this->line, 'in', $this->file);
        } else {
            $msg = str_concat_space('Unable to locate file', $path, 'on line', $this->line, 'in', $this->file);
        }


        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}