<?php

use EncoreDigitalGroup\StdLib\Objects\Filesystem\File;
use EncoreDigitalGroup\StdLib\Exceptions\FilesystemExceptions\FileNotFoundException;
use EncoreDigitalGroup\StdLib\Objects\Support\Types\Str;

test('delete method removes a file', function () {
    $tempFile = tempnam(sys_get_temp_dir(), 'test');
    expect(file_exists($tempFile))->toBeTrue();

    File::delete($tempFile);

    expect(file_exists($tempFile))->toBeFalse();
});

test('reads the content of a file', function () {
    $path = 'test.txt';
    file_put_contents($path, 'Hello, World!');

    $content = File::content($path);

    expect($content)->toBe('Hello, World!');

    unlink($path);
});

test('deletes a file', function () {
    $path = 'test.txt';
    file_put_contents($path, 'Hello, World!');

    File::delete($path);

    expect(file_exists($path))->toBeFalse();
});

test('throws an exception if the file is not found when deleting', function () {
    $path = 'nonexistent.txt';

    File::delete($path);
})->throws(FileNotFoundException::class);

test('copies a file', function () {
    $source = 'source.txt';
    $destination = 'destination.txt';
    file_put_contents($source, 'Hello, World!');

    File::copy($source, $destination);

    expect(file_exists($destination))->toBeTrue()
        ->and(file_get_contents($destination))->toBe('Hello, World!');

    unlink($source);
    unlink($destination);
});

test('throws an exception if the source file is not found when copying', function () {
    $source = 'nonexistent.txt';
    $destination = 'destination.txt';

    File::copy($source, $destination);
})->throws(FileNotFoundException::class);