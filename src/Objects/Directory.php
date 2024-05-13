<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\DirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Exceptions\ImproperBooleanReturnedException;

/**
 * @api
 *
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

    public static function scan(string $dir, array &$results = []): array
    {
        $files = scandir($dir);

        if (!$files) {
            throw new ImproperBooleanReturnedException();
        }

        foreach ($files as $file) {
            $dir = realpath($dir . DIRECTORY_SEPARATOR . $file);

            if (!$dir) {
                throw new ImproperBooleanReturnedException();
            }

            if (!is_dir($dir)) {
                $results[] = $dir;
            } elseif ($file != '.' && $file != '..') {
                self::scan($dir, $results);
                $results[] = $dir;
            }
        }

        return $results;
    }
}
