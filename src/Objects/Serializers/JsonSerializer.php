<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerializer
{
    protected static Collection $normalizers;

    public static function setNormalizers(array $normalizers = []): void
    {
        if ($normalizers == []) {
            $normalizers = [
                new ObjectNormalizer,
            ];
        }

        static::$normalizers = new Collection($normalizers);
    }

    public static function normalizers(): Collection
    {
        if (!isset(static::$normalizers)) {
            static::setNormalizers();
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