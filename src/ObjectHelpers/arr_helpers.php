<?php

use EncoreDigitalGroup\StdLib\Exceptions\ArgumentNullException;
use EncoreDigitalGroup\StdLib\Objects\Arr;

if (!function_exists('arr_to_short_syntax')) {
    /**
     * @throws ArgumentNullException
     * @deprecated No Replacement
     */
    function arr_to_short_syntax(array|string $value): array|string
    {
        return Arr::convertToShortSyntax($value);
    }
}
