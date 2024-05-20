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
    /** @throws FileNotFoundException */
    function file_copy(string $source, string $destination): void
    {
        File::copy($source, $destination);
    }
}

if (!function_exists('file_delete')) {
    /** @throws FileNotFoundException */
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
    function file_type(string $path): false|string
    {
        return filetype($path);
    }
}
