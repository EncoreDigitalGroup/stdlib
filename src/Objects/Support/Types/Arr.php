<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Types;

use Illuminate\Support\Arr as ArraySupport;

class Arr extends ArraySupport
{
    public static function empty(): array
    {
        return [];
    }
}
