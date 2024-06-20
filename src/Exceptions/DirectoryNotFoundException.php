<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\DirectoryNotFoundException as BaseDirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Objects\ExitCode;

/** @deprecated use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\DirectoryNotFoundException instead */
class DirectoryNotFoundException extends BaseDirectoryNotFoundException
{
    public function __construct(?string $path = null)
    {
        parent::__construct($msg);
    }
}
