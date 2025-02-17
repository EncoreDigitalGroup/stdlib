<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class JsonSerializer extends AbstractSerializer
{
    protected static Collection $normalizers;

    protected static function format(): string
    {
        return "json";
    }

    protected static function encoders(): array
    {
        return [(new JsonEncoder)];
    }
}