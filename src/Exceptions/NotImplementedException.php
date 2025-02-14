<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;

/** @codeCoverageIgnore */
class NotImplementedException extends BaseException
{
    public function __construct()
    {
        $msg = "Method is not implemented on line {$this->line} in {$this->file}";

        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}
