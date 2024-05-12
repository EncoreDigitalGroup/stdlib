<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\DirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Exceptions\ImproperBooleanReturnedException;

/** @api */
class Directory
{
    /**
     * Get the current working directory.
     */
    public static function current(): string
    {
        if (!getcwd()) {
            throw new ImproperBooleanReturnedException();
        }

        return getcwd();
    }

    /**
     * Get the MD5 hash of a directory
     */
    public static function hash(string $dir): string
    {
        if (!is_dir($dir)) {
            throw new DirectoryNotFoundException();
        }

        $files = scandir($dir);

        if (!$files) {
            throw new ImproperBooleanReturnedException();
        }

        $hashes = [];
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $filePath = $dir . '/' . $file;

                if (is_dir($filePath)) {
                    $hashes = self::hash($filePath);
                } else {
                    $hashes[] = md5_file($filePath);
                }
            }
        }

        $hashes = Arr::flatten($hashes);

        return md5(implode('', $hashes));
    }
}
