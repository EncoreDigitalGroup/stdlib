<?php

use EncoreDigitalGroup\StdLib\Objects\Support\Php;

test('versionGreaterThanOrEqual method returns true if PHP version is greater than or equal to the given version', function () {
    $version = '7.0.0';

    $result = Php::greaterThanOrEqual($version);

    expect($result)->toBeTrue();
});

test('versionLessThanOrEqual method returns true if PHP version is less than or equal to the given version', function () {
    $version = PHP_VERSION;

    $result = Php::lessThanOrEqual($version);

    expect($result)->toBeTrue();
});

test('versionGreaterThan method returns true if PHP version is greater than the given version', function () {
    $version = '5.0.0';

    $result = Php::greaterThan($version);

    expect($result)->toBeTrue();
});

test('versionLessThan method returns false if PHP version is less than the given version', function () {
    $version = '5.0.0';

    $result = Php::lessThan($version);

    expect($result)->toBeFalse();
});

test('versionEqualTo method returns true if PHP version is equal to the given version', function () {
    $version = PHP_VERSION;

    $result = Php::equalTo($version);

    expect($result)->toBeTrue();
});