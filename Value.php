<?php

namespace EncoreDigitalGroup\StdLib;

class Value
{
    public static function notNull(mixed $value): bool
    {
        if ($value === null) {
            return false;
        }

        return true;
    }
}
