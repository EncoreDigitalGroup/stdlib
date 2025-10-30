<?php

/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Serializers;

use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapInputName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Attributes\MapOutputName;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Mappers\IPropertyMapper;
use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionParameter;
use ReflectionProperty;
use RuntimeException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class JsonSerializer extends AbstractSerializer
{
    protected static Collection $normalizers;

    private const string MAPPER_DIRECTION_INPUT = "input";
    private const string MAPPER_DIRECTION_OUTPUT = "output";

    public static function serialize(object $object): string
    {
        if (self::hasMapNameAttributes($object)) {
            return self::serializeWithMapName($object);
        }

        return parent::serialize($object);
    }

    /** @param class-string $class */
    public static function deserialize(string $class, string $data): mixed
    {
        if (self::hasMapNameAttributes($class)) {
            return self::deserializeWithMapName($class, $data);
        }

        return parent::deserialize($class, $data);
    }

    protected static function format(): string
    {
        return "json";
    }

    protected static function encoders(): array
    {
        return [(new JsonEncoder)];
    }

    /**
     * @param  class-string|object  $classOrObject
     */
    private static function hasMapNameAttributes(string|object $classOrObject): bool
    {
        $reflection = new ReflectionClass($classOrObject);

        if ($reflection->getAttributes(MapName::class) !== [] ||
            $reflection->getAttributes(MapInputName::class) !== [] ||
            $reflection->getAttributes(MapOutputName::class) !== []) {
            return true;
        }

        foreach ($reflection->getProperties() as $reflectionProperty) {
            if (!empty($reflectionProperty->getAttributes(MapName::class)) ||
                !empty($reflectionProperty->getAttributes(MapInputName::class)) ||
                !empty($reflectionProperty->getAttributes(MapOutputName::class))) {
                return true;
            }
        }

        return false;
    }

    private static function serializeWithMapName(object $object): string
    {
        $reflection = new ReflectionClass($object);
        $data = [];

        foreach ($reflection->getProperties() as $reflectionProperty) {
            $reflectionProperty->setAccessible(true);
            $propertyName = $reflectionProperty->getName();
            $value = $reflectionProperty->getValue($object);

            $mappedName = self::getMappedOutputName($reflectionProperty, $reflection) ?? $propertyName;
            $data[$mappedName] = $value;
        }

        $json = json_encode($data);
        if ($json === false) {
            throw new RuntimeException("Failed to encode JSON");
        }

        return $json;
    }

    /**
     * @param  class-string  $class
     */
    private static function deserializeWithMapName(string $class, string $jsonData): mixed
    {
        $data = json_decode($jsonData, true);
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return $reflection->newInstance();
        }

        $args = [];
        foreach ($constructor->getParameters() as $reflectionParameter) {
            $args[] = self::resolveParameterValue($reflectionParameter, $reflection, $data);
        }

        return $reflection->newInstanceArgs($args);
    }

    private static function resolveParameterValue(ReflectionParameter $parameter, ReflectionClass $reflection, array $data): mixed
    {
        $parameterName = $parameter->getName();
        $property = $reflection->hasProperty($parameterName) ? $reflection->getProperty($parameterName) : null;

        if ($property) {
            $mappedName = self::getMappedInputName($property, $reflection) ?? $parameterName;
            $keyToUse = $mappedName;
        } else {
            $keyToUse = $parameterName;
        }

        if (array_key_exists($keyToUse, $data)) {
            return $data[$keyToUse];
        }

        return $parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null;
    }

    private static function getMappedOutputName(ReflectionProperty $property, ReflectionClass $classReflection): ?string
    {
        return self::getMapperForDirection($property, $property->getName(), self::MAPPER_DIRECTION_OUTPUT)
            ?? self::getMapperForDirection($classReflection, $property->getName(), self::MAPPER_DIRECTION_OUTPUT);
    }

    private static function getMappedInputName(ReflectionProperty $property, ReflectionClass $classReflection): ?string
    {
        return self::getMapperForDirection($property, $property->getName(), self::MAPPER_DIRECTION_INPUT)
            ?? self::getMapperForDirection($classReflection, $property->getName(), self::MAPPER_DIRECTION_INPUT);
    }

    private static function getMapperResult(string|IPropertyMapper $mapper, string $propertyName): string
    {
        if (is_string($mapper)) {
            if (class_exists($mapper)) {
                $mapperInstance = new $mapper;
                if ($mapperInstance instanceof IPropertyMapper) {
                    return $mapperInstance->map($propertyName);
                }
            }

            return $mapper;
        }

        return $mapper->map($propertyName);
    }

    private static function getMapperForDirection(ReflectionProperty|ReflectionClass $reflector, string $propertyName, string $direction): ?string
    {
        $specificAttributeClass = $direction === self::MAPPER_DIRECTION_INPUT ? MapInputName::class : MapOutputName::class;

        $specificAttributes = $reflector->getAttributes($specificAttributeClass);
        if ($specificAttributes !== []) {
            return self::getMapperResult($specificAttributes[0]->newInstance()->mapper, $propertyName);
        }

        $mapNameAttributes = $reflector->getAttributes(MapName::class);
        if ($mapNameAttributes !== []) {
            $mapNameInstance = $mapNameAttributes[0]->newInstance();
            $mapper = $direction === self::MAPPER_DIRECTION_OUTPUT
                ? ($mapNameInstance->output ?? $mapNameInstance->input)
                : $mapNameInstance->input;
            if ($mapper !== null) {
                return self::getMapperResult($mapper, $propertyName);
            }
        }

        return null;
    }
}