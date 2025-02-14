<?php

use EncoreDigitalGroup\StdLib\Objects\Http\Url;

test('encode method encodes data', function () {
    $data = 'Hello World';

    $result = Url::encode($data);

    expect($result)->toEqual('Hello+World');
});

test('decode method decodes data', function () {
    $data = 'Hello%20World';

    $result = Url::decode($data);

    expect($result)->toEqual('Hello World');
});

test('decode method returns null if data is null', function () {
    $data = null;

    $result = Url::decode($data);

    expect($result)->toBeNull();
});