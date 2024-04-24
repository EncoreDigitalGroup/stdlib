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
}
