<?php

use EncoreDigitalGroup\StdLib\Objects\Number;

if (!function_exists('num_to_int')) {
    function num_to_int($value): int
    {
        return Number::toInt($value);
    }
}
