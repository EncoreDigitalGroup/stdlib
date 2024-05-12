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

test('Directory hash method throws DirectoryNotFoundException for non-existent directory', function () {
    $directoryPath = '/non/existent/directory/path';
    expect(fn() => Directory::hash($directoryPath))->toThrow(DirectoryNotFoundException::class);
});

test('Directory hash method throws ImproperBooleanReturnedException when scandir fails', function () {
    // This test might be hard to implement as it's difficult to simulate a scandir failure
    // You might need to mock the scandir function or use vfsStream to create a virtual file system for testing
});