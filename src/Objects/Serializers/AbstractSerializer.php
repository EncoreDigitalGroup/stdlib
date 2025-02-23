<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractSerializer
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

    public static function addNormalizer(NormalizerInterface|DenormalizerInterface $normalizer): void
    {
        static::normalizers()->add($normalizer);
    }

    public static function prependNormalizer(NormalizerInterface|DenormalizerInterface $normalizer): void
    {
        static::normalizers()->prepend($normalizer);
    }

    public static function resetNormalizers(): void
    {
        static::setNormalizers();
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
        $serializer = new Serializer(static::normalizers()->all(), static::encoders());
        $normalized = $serializer->normalize($object);

        return $serializer->serialize($normalized, static::format());
    }

    public static function deserialize(string $class, string $data): mixed
    {
        $serializer = new Serializer(static::normalizers()->all(), static::encoders());
        $json = $serializer->deserialize($data, $class, static::format());

        return $serializer->denormalize($json, $class);
    }

    abstract protected static function format(): string;

    abstract protected static function encoders(): array;
}