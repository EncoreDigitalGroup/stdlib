<?php

declare(strict_types=1);

use EncoreDigitalGroup\StdLib\Support\Internal\Rector\Rector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
    ])
    ->withRules(Rector::rules());
