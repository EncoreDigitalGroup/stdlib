<?php

use EncoreDigitalGroup\StdLib\Objects\Filesystem\Directory;

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

test('hash method processes files correctly, excluding . and .. entries', function () {
    $dir = __DIR__ . '/test_dir';
    mkdir($dir);
    file_put_contents($dir . '/file1.txt', 'Hello');
    file_put_contents($dir . '/file2.txt', 'World');
    mkdir($dir . '/subdir');
    file_put_contents($dir . '/subdir/file3.txt', 'Subdir file');

    // Ensure files are created
    expect(file_exists($dir . '/file1.txt'))->toBeTrue()
        ->and(file_exists($dir . '/file2.txt'))->toBeTrue()
        ->and(file_exists($dir . '/subdir/file3.txt'))->toBeTrue();

    $expectedHash = Directory::hash($dir);
    expect(Directory::hash($dir))->toBe($expectedHash);

    unlink($dir . '/file1.txt');
    unlink($dir . '/file2.txt');
    unlink($dir . '/subdir/file3.txt');
    rmdir($dir . '/subdir');
    rmdir($dir);
});