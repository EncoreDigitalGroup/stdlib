<?php

namespace EncoreDigitalGroup\StdLib\Objects\Support\Types;

use Illuminate\Support\Arr as ArraySupport;

class Arr extends ArraySupport
{
    public static function empty(): array
    {
        return [];
    }

    public static function renameKey(array $array, string $oldKey, string $newKey): array
    {
        if (!array_key_exists($oldKey, $array)) {
            return $array;
        }

        $keys = array_keys($array);
        $index = array_search($oldKey, $keys);

        $keys[$index] = $newKey;
        $values = array_values($array);

        return array_combine($keys, $values);
    }

    public static function addAfter(array $array, string $afterKey, string $newKey, mixed $newValue): array
    {
        if (!array_key_exists($afterKey, $array)) {
            return $array;
        }

        $newArray = [];
        foreach ($array as $key => $value) {
            $newArray[$key] = $value;

            if ($key === $afterKey) {
                $newArray[$newKey] = $newValue;
            }
        }

        return $newArray;
    }
}
