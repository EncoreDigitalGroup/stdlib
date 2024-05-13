<?php

use EncoreDigitalGroup\StdLib\Objects\Value;

test('notNull method returns true if value is not null', function () {
    $value = 'Hello World';

    $result = Value::notNull($value);

    expect($result)->toBeTrue();
});

test('notNull method returns false if value is null', function () {
    $value = null;

    $result = Value::notNull($value);

    expect($result)->toBeFalse();
});

test('transformBool method transforms a value to a boolean', function () {
    $value = 'true';

    $result = Value::transformBool($value);

    expect($result)->toBeTrue();
});

test('transformBool method returns false if value cannot be transformed to a boolean', function () {
    $value = 'not a boolean';

    $result = Value::transformBool($value);

    expect($result)->toBeFalse();
});