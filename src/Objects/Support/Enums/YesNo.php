<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Support\Enums;

use EncoreDigitalGroup\StdLib\Objects\Support\Traits\HasEnumValue;

enum YesNo: string
{
    use HasEnumValue;

    case Yes = "yes";
    case No = "no";
}