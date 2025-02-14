<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;

class FileNotFoundException extends BaseException
{
    public function __construct(?string $path = null)
    {
        if (is_null($path)) {
            $msg = "Unable to locate file on line {$this->line} in {$this->file}";
        } else {
            $msg = "Unable to locate file {$path} on line {$this->line} in {$this->file}";
        }

        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}
