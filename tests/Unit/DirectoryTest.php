<?php

use EncoreDigitalGroup\StdLib\Objects\Directory;
use EncoreDigitalGroup\StdLib\Exceptions\DirectoryNotFoundException;
use EncoreDigitalGroup\StdLib\Exceptions\ImproperBooleanReturnedException;

test('Directory current method returns current directory', function () {
    $currentDirectory = Directory::current();
    expect($currentDirectory)->toBe(getcwd());
});

test('Directory hash method returns md5 hash of a directory', function () {
    $directoryPath = __DIR__; // You can replace this with any directory path for testing
    $hash = Directory::hash($directoryPath);
    expect($hash)->toBeString();
});

test('Directory hash method returns expected hash', function () {
    $directoryPath = __DIR__ . '/../test_files/hash_test/';
    $hash = Directory::hash($directoryPath);
    expect($hash)->toBe('d41d8cd98f00b204e9800998ecf8427e');
});

test('Directory scan returns array', function () {
    $directoryPath = __DIR__ . '/../test_files/hash_test/';
    $hash = Directory::scan($directoryPath);
    expect($hash)->toBeArray();
});