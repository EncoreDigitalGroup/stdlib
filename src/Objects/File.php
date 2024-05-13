<?php

namespace EncoreDigitalGroup\StdLib\Objects;

use EncoreDigitalGroup\StdLib\Exceptions\FileNotFoundException;

/**
 * @api
 *
 * @internal
 */
class File
{
    /**
     * @experimental
     *
     * @codeCoverageIgnore
     */
    public static function getContent(string $path): string
    {
        $file = file_get_contents($path);

        if ($file === '' || $file === '0' || $file === false) {
            throw new FileNotFoundException($path);
        }

        return $file;
    }

    public static function delete(string $path): void
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException($path);
        }

        unlink($path);
    }
}
