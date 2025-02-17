<?php

namespace EncoreDigitalGroup\StdLib\Objects\Serializers;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

/** @experimental */
class XmlSerializer extends AbstractSerializer
{
    protected static Collection $normalizers;

    protected static function format(): string
    {
        return "xml";
    }

    protected static function encoders(): array
    {
        return [(new XmlEncoder)];
    }
}