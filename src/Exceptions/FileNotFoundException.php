<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException as BaseFileNotFoundException;

/** @deprecated use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException instead. */
class FileNotFoundException extends BaseFileNotFoundException
{
    public function __construct(?string $path = null)
    {
        parent::__construct($path);
    }
}
