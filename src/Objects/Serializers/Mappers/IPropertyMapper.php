<?php
/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers;

interface IPropertyMapper
{
    public function map(string $propertyName): string;
}