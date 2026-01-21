<?php


namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers;

interface IPropertyMapper
{
    public function map(string $propertyName): string;
}