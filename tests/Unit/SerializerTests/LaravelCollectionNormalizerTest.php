<?php

use EncoreDigitalGroup\StdLib\Objects\Serializers\JsonSerializer;
use EncoreDigitalGroup\StdLib\Objects\Serializers\Normalizers\LaravelCollectionNormalizer;
use Illuminate\Support\Collection;

describe("LaravelCollectionNormalizer Tests", function () {
    beforeEach(function () {
        $this->normalizer = new LaravelCollectionNormalizer;
        $this->dataset = ['foo' => 'bar', 'baz' => 'qux'];
        $this->jsonDataset = json_encode($this->dataset);
        JsonSerializer::useLaravelCollectionNormalizer();
    });

    test('it can normalize a Laravel collection', function () {
        $collection = new Collection($this->dataset);

        $result = JsonSerializer::serialize($collection);

        expect($result)->toBe($this->jsonDataset);
    });

    test('it supports normalization of Laravel collections', function () {
        $collection = new Collection();
        $nonCollection = new stdClass();

        expect($this->normalizer->supportsNormalization($collection))->toBeTrue()
            ->and($this->normalizer->supportsNormalization($nonCollection))->toBeFalse();
    });

    test('it can denormalize data to a Laravel collection', function () {
        $result = $this->normalizer->denormalize($this->dataset, Collection::class);

        expect($result)->toBeInstanceOf(Collection::class)
            ->and($result->toArray())->toBe($this->dataset);
    });

    test('it supports denormalization to Laravel collections', function () {
        expect($this->normalizer->supportsDenormalization([], Collection::class))->toBeTrue()
            ->and($this->normalizer->supportsDenormalization([], stdClass::class))->toBeFalse();
    });

    test('it returns supported types', function () {
        $supportedTypes = $this->normalizer->getSupportedTypes(null);

        expect($supportedTypes)->toBe([Collection::class => true]);
    });

});

