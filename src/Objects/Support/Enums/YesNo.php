<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Enums;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum YesNo: string
{
    use HasEnumValue;

    case Yes = "yes";
    case No = "no";

    public function toBoolean(): bool
    {
        return $this === self::Yes;
    }
}