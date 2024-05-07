<?php

if (!function_exists('file_save_contents')) {
    function file_save_contents(string $path, mixed $data): void
    {
        file_put_contents($path, $data);
    }
}