<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\DirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Exceptions\ImproperBooleanReturnedException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/** @api */
class Directory
{
    /**
     * Get the current working directory.
     *
     * @codeCoverageIgnore
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
            throw new DirectoryNotFoundException(); //@codeCoverageIgnore
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

    /**
     * @codeCoverageIgnore
     */
    public static function scan(string $dir, array &$results = []): array
    {
        $files = scandir($dir);

        if (!$files) {
            throw new ImproperBooleanReturnedException();
        }

        foreach ($files as $file) {
            $dir = realpath($dir . DIRECTORY_SEPARATOR . $file);

            if ($dir) {
                if (!is_dir($dir)) {
                    $results[] = $dir;
                } elseif ($file != '.' && $file != '..') {
                    self::scan($dir, $results);
                    $results[] = $dir;

                }
            }
        }

        return $results;
    }

    /**
     * List all files in a directory recursively
     *
     * @codeCoverageIgnore
     */
    public static function scanRecursive(string $path): array
    {
        $directoryFiles = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path),
            RecursiveIteratorIterator::SELF_FIRST
        );

        $files = [];
        foreach ($directoryFiles as $file) {
            if ($file->isFile()) {
                $files[] = $file->getRealpath();
            }
        }

        return $files;
    }
}
