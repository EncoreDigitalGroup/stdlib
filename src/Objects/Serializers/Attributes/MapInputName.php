<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes;

use Attribute;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers\IPropertyMapper;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS)]
class MapInputName
{
    public function __construct(
        public string|IPropertyMapper $mapper
    ) {}
}