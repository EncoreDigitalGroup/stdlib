<?php

use EncoreDigitalGroup\StdLib\Json;

if (! function_exists('json_not_null')) {
    function json_not_null(object $object): string
    {
        return Json::encodeOnlyNotNullProperties($object);
    }
}
