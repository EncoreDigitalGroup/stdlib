<?php

use EncoreDigitalGroup\StdLib\Exceptions\FileNotFoundException;
use EncoreDigitalGroup\StdLib\Objects\File;

if (!function_exists('file_save_contents')) {
    function file_save_contents(string $path, mixed $data): void
    {
        file_put_contents($path, $data);
    }
}

if (!function_exists('file_delete')) {
    /** @throws FileNotFoundException */
    function file_delete(string $path): void
    {
        File::delete($path);
    }
}
