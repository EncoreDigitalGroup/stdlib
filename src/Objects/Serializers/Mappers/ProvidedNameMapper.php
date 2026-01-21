<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers;

readonly class ProvidedNameMapper implements IPropertyMapper
{
    public function __construct(private string $mappedName) {}

    public function map(string $propertyName): string
    {
        return $this->mappedName;
    }
}