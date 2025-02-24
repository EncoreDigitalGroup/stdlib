<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Normalizers;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/** @experimental */
readonly class LaravelCollectionNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function __construct(private NormalizerInterface&DenormalizerInterface $normalizer) {}

    public function normalize(mixed $data, ?string $format = null, array $context = []): array
    {
        if (!$data instanceof Collection) {
            throw new InvalidArgumentException("Data must be an instance of Collection to normalize.");
        }

        return array_map(fn ($item): mixed => $this->normalizer->normalize($item, $format, $context), $data->all());
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Collection;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): Collection
    {
        if (!is_iterable($data)) {
            throw new InvalidArgumentException("Data must be iterable to denormalize into a Collection.");
        }

        $items = array_map(function ($value) use ($format, $context) {
            return is_iterable($value)
                ? $this->normalizer->denormalize($value, Collection::class, $format, $context)
                : $value;
        }, is_array($data) ? $data : iterator_to_array($data));

        return new Collection($items);
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return is_a($type, Collection::class, true);
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Collection::class => true,
            Collection::class . "::*" => true,
        ];
    }
}