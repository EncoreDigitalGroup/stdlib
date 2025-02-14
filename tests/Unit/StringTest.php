<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;

test('guid method returns a UUID', function () {
    $result = Str::guid();

    expect(strlen($result))->toEqual(36);
});

test('toString method converts a value to a string', function () {
    $value = 123;

    $result = Str::toString($value);

    expect($result)->toEqual('123')
        ->and(is_string($result))->toBeTrue();
});

test('empty method returns an empty string', function () {
    $result = Str::empty();

    expect($result)->toEqual('');
});

test('maxLength method limits the length of a string', function () {
    $value = 'Hello World';

    $result = Str::maxLength($value, 5);

    expect($result)->toEqual('Hello...');
});