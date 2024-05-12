<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\FileNotFoundException;

class File
{
    public static function getContent(string $path): string
    {
        $file = file_get_contents($path);

        if (!$file) {
            throw new FileNotFoundException($path);
        }

        return $file;
    }

    public static function delete(string $path): void
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException($path);
        }

        unlink($path);
    }
}