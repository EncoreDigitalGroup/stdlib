<?php

use EncoreDigitalGroup\StdLib\Objects\Json;

if (!function_exists("json_not_null")) {
    /** @deprecated No replacement. */
    function json_not_null(object $object): string
    {
        return Json::encodeOnlyNotNullProperties($object);
    }
}
