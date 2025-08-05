<?php
/*
 * Copyright (c) 2025. Encore Digital Group.
 * All Rights Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Objects\Serializers\Normalizers;

use Carbon\Carbon;
use Illuminate\Support\Carbon as IlluminateCarbon;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/** @experimental */
class CarbonNormalizer implements DenormalizerInterface, NormalizerInterface
{
    /** @var Carbon $data */
    public function normalize(mixed $data, ?string $format = null, array $context = []): string
    {
        return $data->toW3cString();
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof Carbon;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ?Carbon
    {
        if (null === $data) {
            return null;
        }

        return new Carbon($data);
    }

    public function supportsDenormalization(mixed $data, ?string $type, ?string $format = null, array $context = []): bool
    {
        return Carbon::class === $type && ($data === null || is_string($data));
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Carbon::class,
            IlluminateCarbon::class,
        ];
    }
}