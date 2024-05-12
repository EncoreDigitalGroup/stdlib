<?php

namespace EncoreDigitalGroup\StdLib\Exceptions;

use EncoreDigitalGroup\StdLib\Objects\ExitCode;

class ImproperBooleanReturnedException extends BaseException
{
    public function __construct(bool $expected = true)
    {
        $expect = 'true';
        $actual = 'false';

        if (!$expected) {
            $expect = 'false';
            $actual = 'true';
        }

        $msg = str_concat_space('Improper boolean returned. Expected', $expect, 'but got', $actual);

        parent::__construct($msg, ExitCode::DATA_ERROR, $this->getPrevious());
    }
}
