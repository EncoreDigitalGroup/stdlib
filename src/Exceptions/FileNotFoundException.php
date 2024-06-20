<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException as BaseFileNotFoundException;
use EncoreDigitalGroup\StdLib\Objects\ExitCode;

/** @deprecated use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException instead. */
class FileNotFoundException extends BaseFileNotFoundException
{
    public function __construct(?string $path = null)
    {
        parent::__construct($msg);
    }
}
