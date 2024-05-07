<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\FileNotFoundException;

class File
{
    public static function getContent(string $path): string
    {
        $file = file_get_contents($path);

        if(!$file) {
            throw new FileNotFoundException($path);
        }

        return $file;
    }
}