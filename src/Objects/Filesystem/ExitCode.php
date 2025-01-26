<?php

namespace EncoreDigitalGroup\StdLib\Objects\Filesystem;

use EncoreDigitalGroup\StdLib\Objects\Http\HttpStatusCode;

/**
 * @api
 *
 * @codeCoverageIgnore
 */
class ExitCode
{
    const SUCCESS = 0;
    const GENERAL_ERROR = 1;
    const ILLEGAL_ARGUMENT_DUPLICATION = 3;
    const UNSATISFIED_ARGUMENT_DEPENDENCY = 8;
    const VALUE_OUT_OF_RANGE = 32;
    const VALUE_OVERFLOW = 33;
    const INVALID_VALUE = 34;
    const INVALID_LICENSE = 35;
    const HIGH_LEVEL_PARSER_ERROR = 62;
    const DATABASES_IDENTICAL = 63;
    const COMMAND_LINE_USAGE_ERROR = 64;
    const DATA_ERROR = 65;
    const RESOURCE_UNAVAILABLE = 69;
    const UNHANDLED_EXCEPTION_OCCURRED = 70;
    const FAILED_TO_CREATE_REPORT = 73;
    const IO_ERROR = 74;
    const INSUFFICIENT_PERMISSION = 77;
    const SQL_SERVER_ERROR = 126;
    const CTRL_BREAK = 130;
    const BAD_REQUEST = HttpStatusCode::BAD_REQUEST;
    const NOT_LICENSED = HttpStatusCode::NOT_LICENSED;
    const ACTIVATION_CANCELLED_BY_USER = 499;
    const INTERNAL_SERVER_ERROR = HttpStatusCode::INTERNAL_SERVER_ERROR;
}
