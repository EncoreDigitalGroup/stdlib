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
