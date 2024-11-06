<?php

use EncoreDigitalGroup\StdLib\Exceptions\FileNotFoundException;
use EncoreDigitalGroup\StdLib\Objects\File;

if (!function_exists('file_save_contents')) {
    /** @deprecated use file_put_contents() instead */
    function file_save_contents(string $path, mixed $data): void
    {
        file_put_contents($path, $data);
    }
}

if (!function_exists('file_copy')) {
    /**
     * @throws FileNotFoundException
     * @deprecated
     */
    function file_copy(string $source, string $destination): void
    {
        File::copy($source, $destination);
    }
}

if (!function_exists('file_delete')) {
    /**
     * @throws FileNotFoundException
     * @deprecated
     */
    function file_delete(string $path): void
    {
        File::delete($path);
    }
}

if (!function_exists('file_last_accessed')) {
    function file_last_accessed(string $path): false|int
    {
        return fileatime($path);
    }
}

if (!function_exists('file_last_changed')) {
    function file_last_changed(string $path): false|int
    {
        return filectime($path);
    }
}

if (!function_exists('file_last_modified')) {
    function file_last_modified(string $path): false|int
    {
        return filemtime($path);
    }
}

if (!function_exists('file_size')) {
    function file_size(string $path): false|int
    {
        return filesize($path);
    }
}

if (!function_exists('file_type')) {
    /**
     * @since 1.0.0 - Returns the type of the file. Possible values are fifo, char, dir, block, link, file, socket and unknown.
     * @since 2.0.0 - Returns the extension of the file.
     */
    function file_type(string $path): false|string
    {
        return filetype($path);
    }
}

if (!function_exists('file_system_type')) {
    /**
     * @since 1.5.1 - Returns the type of the file. Possible values are fifo, char, dir, block, link, file, socket and unknown.
     */
    function file_system_type(string $path): false|string
    {
        return filetype($path);
    }
}

if (!function_exists('file_get_type')) {
    /**
     * Get the file type based on the extension
     *
     * @since 1.5.1 - Returns the file type based on the extension.
     */
    function file_get_type(string $path): false|string
    {
        if (is_file($path)) {
            return pathinfo($path, PATHINFO_EXTENSION);
        }

        return false;
    }
}
