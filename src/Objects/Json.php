<?php

namespace EncoreDigitalGroup\StdLib\Objects;

/**
 * @api
 *
 * @internal
 */
class Json
{
    /**
     * JSON Encode Only Not Null Properties
     *
     * @internal
     * @experimental
     */
    public static function encodeOnlyNotNullProperties(object $object): string
    {
        $jsonString = json_encode($object);

        if ($jsonString === false) {
            return '';
        }

        $array = json_decode($jsonString, true);

        if ($array === null) {
            return '';
        }

        $array = array_filter($array, function ($value): bool {
            return $value !== null;
        });

        $result = json_encode($array);

        if ($result === false) {
            return '';
        }

        return $result;
    }
}
