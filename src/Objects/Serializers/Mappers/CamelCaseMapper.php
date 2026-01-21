<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers;

use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;

class CamelCaseMapper implements IPropertyMapper
{
    public function map(string $propertyName): string
    {
        return Str::camel($propertyName);
    }
}