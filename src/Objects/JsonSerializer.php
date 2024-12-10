<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/** @experimental */
class JsonSerializer
{
    protected static Collection $normalizers;
    protected static Serializer $serializer;

    public static function normalizers(): Collection
    {
        $defaultNormalizers = [
            ObjectNormalizer::class,
        ];

        if (!isset(static::$normalizers)) {
            static::$normalizers = new Collection($defaultNormalizers);
        }

        return static::$normalizers;
    }

    public static function serialize(object $object): string
    {
        $serializer = new Serializer(static::normalizers()->all(), [(new JsonEncoder)]);
        $normalized = $serializer->normalize($object);

        return $serializer->serialize($normalized, "json");
    }

    public static function deserialize(string $class, string $data): mixed
    {
        $serializer = new Serializer(static::normalizers()->all(), [(new JsonEncoder)]);
        $json = $serializer->deserialize($data, $class, "json");

        return $serializer->denormalize($json, $class);
    }
}