<?php

use EncoreDigitalGroup\StdLib\Number;

if (!function_exists('num_to_int')) {
    function num_to_int($value): int
    {
        return Number::toInt($value);
    }
}
