<?php

namespace EncoreDigitalGroup\StdLib\Support\Internal\Composer;

use Composer\Script\Event;
use EncoreDigitalGroup\StdLib\Support\Internal\Generators\AssertableGenerator;
use EncoreDigitalGroup\StdLib\Support\Internal\IdeHelper;

/**
 * @internal
 *
 * @codeCoverageIgnore
 */
class Scripts
{
    public static function postAutoloadDump(Event $event): void
    {
        require_once $event->getComposer()->getConfig()->get("vendor-dir") . "/autoload.php";

        IdeHelper::updateEditorConfig();
        IdeHelper::updatePint();
    }

    public static function generateAssertable(Event $event): void
    {
        if (in_array("--check", $event->getArguments(), true)) {
            AssertableGenerator::assertCurrent();

            return;
        }

        AssertableGenerator::write();
    }
}
