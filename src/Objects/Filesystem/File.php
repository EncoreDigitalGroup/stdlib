<?php

namespace EncoreDigitalGroup\StdLib\Objects\Filesystem;

use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException;

class File
{
    /** @codeCoverageIgnore */
    public static function content(string $path): string
    {
        $file = @file_get_contents($path);

        if ($file === "" || $file === "0" || $file === false) {
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

    public static function copy(string $source, string $destination): void
    {
        if (!file_exists($source)) {
            throw new FileNotFoundException($source);
        }

        copy($source, $destination);
    }
}
