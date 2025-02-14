<?php

if (!function_exists("file_last_accessed")) {
    function file_last_accessed(string $path): false|int
    {
        return fileatime($path);
    }
}

if (!function_exists("file_last_changed")) {
    function file_last_changed(string $path): false|int
    {
        return filectime($path);
    }
}

if (!function_exists("file_last_modified")) {
    function file_last_modified(string $path): false|int
    {
        return filemtime($path);
    }
}

if (!function_exists("file_size")) {
    function file_size(string $path): false|int
    {
        return filesize($path);
    }
}
