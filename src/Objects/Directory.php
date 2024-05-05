<?php

namespace EncoreDigitalGroup\StdLib\Objects;

class Directory
{
    /**
     * Get the current working directory.
     */
    public static function current(): string
    {
        return getcwd();
    }

    /**
     * Get the directory of the current file.
     */
    public static function here(): string
    {
        return __DIR__;
    }

    /**
     * Get the MD5 hash of a directory
     * @param string $dir
     * @return string
     */
    public static function hash(string $dir): string
    {
        if (!is_dir($dir)) {
            return false;
        }

        $files = scandir($dir);
        $hashes = array();

        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $filePath = $dir . '/' . $file;

                if (is_dir($filePath)) {
                    $hashes[] = self::hash($filePath);
                } else {
                    $hashes[] = md5_file($filePath);
                }
            }
        }

        return md5(implode('', $hashes));
    }
}
