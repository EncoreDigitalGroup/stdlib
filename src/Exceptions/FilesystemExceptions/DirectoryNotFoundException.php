<?php

namespace EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions;

use EncoreDigitalGroup\StdLib\Exceptions\BaseException;
use EncoreDigitalGroup\StdLib\Objects\Filesystem\ExitCode;

class DirectoryNotFoundException extends BaseException
{
    public function __construct(?string $path = null)
    {
        if (is_null($path)) {
            $msg = "Unable to locate directory on line {$this->line} in {$this->file}";
        } else {
            $msg = "Unable to locate directory {$path} on line {$this->line} in {$this->file}";
        }

        parent::__construct($msg, ExitCode::RESOURCE_UNAVAILABLE, $this->getPrevious());
    }
}
