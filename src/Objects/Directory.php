<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\DirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Exceptions\ImproperBooleanReturnedException;

/**
 * @api
 * @internal
 */
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

        $files = self::scan($dir);
        $files = Arr::flatten($files);

        $hashes = [];
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $filePath = $dir . '/' . $file;
                if (!is_dir($filePath)) {
                    $hashes[] = md5_file($filePath);
                }
            }
        }

        return md5(implode('', $hashes));

    }

    public static function scan($dir, &$results = array()): array
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $dir = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($dir)) {
                $results[] = $dir;
            } else if ($value != "." && $value != "..") {
                self::scan($dir, $results);
                $results[] = $dir;
            }
        }

        return $results;
    }
}
