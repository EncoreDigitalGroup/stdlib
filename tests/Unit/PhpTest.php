<?php

use EncoreDigitalGroup\StdLib\Objects\Php;

test('versionGreaterThanOrEqual method returns true if PHP version is greater than or equal to the given version', function () {
    $version = '7.0.0';

    $result = Php::versionGreaterThanOrEqual($version);

    expect($result)->toBeTrue();
});

test('versionLessThanOrEqual method returns true if PHP version is less than or equal to the given version', function () {
    $version = PHP_VERSION;

    $result = Php::versionLessThanOrEqual($version);

    expect($result)->toBeTrue();
});

test('versionGreaterThan method returns true if PHP version is greater than the given version', function () {
    $version = '5.0.0';

    $result = Php::versionGreaterThan($version);

    expect($result)->toBeTrue();
});

test('versionLessThan method returns false if PHP version is less than the given version', function () {
    $version = '5.0.0';

    $result = Php::versionLessThan($version);

    expect($result)->toBeFalse();
});

test('versionEqualTo method returns true if PHP version is equal to the given version', function () {
    $version = PHP_VERSION;

    $result = Php::versionEqualTo($version);

    expect($result)->toBeTrue();
});