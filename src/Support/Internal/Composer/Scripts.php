<?php

/*
 * Copyright (c) 2024. Encore Digital Group.
 * All Right Reserved.
 */

namespace EncoreDigitalGroup\StdLib\Support\Internal\Composer;

use Composer\Script\Event;
use EncoreDigitalGroup\StdLib\Support\Internal\IdeHelper;

/** @internal */
class Scripts
{
    public static function postAutoloadDump(Event $event): void
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir') . '/autoload.php';

        IdeHelper::updateEditorConfig();
        IdeHelper::updatePint();
    }
}
