<?php

use EncoreDigitalGroup\StdLib\Objects\Filesystem\File;

test('delete method removes a file', function () {
    // Create a temporary file
    $tempFile = tempnam(sys_get_temp_dir(), 'test');
    expect(file_exists($tempFile))->toBeTrue();

    // Use the delete method to remove the file
    File::delete($tempFile);

    // Assert the file no longer exists
    expect(file_exists($tempFile))->toBeFalse();
});