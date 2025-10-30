<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes;

use Attribute;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers\IPropertyMapper;

/**
 * @property string|IPropertyMapper $input Mapper used for deserialization operations
 * @property string|IPropertyMapper $output Mapper used for serialization operations. Defaults to input.
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS)]
class MapName
{
    public function __construct(
        public string|IPropertyMapper $input,
        public string|IPropertyMapper|null $output = null
    ) {
        /** @phpstan-ignore-next-line False positive from doc block */
        if (is_null($this->output)) {
            $this->output = $input;
        }
    }
}