<?php

namespace EncoreDigitalGroup\StdLib\Objects;

class Directory
{
    /**
     * Get the current working directory.
     *
     * @return string
     */
    public static function current(): string
    {
        return getcwd();
    }
}