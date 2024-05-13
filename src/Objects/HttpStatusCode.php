<?php

namespace EncoreDigitalGroup\StdLib\Objects;

/**
 * @api
 *
 * @codeCoverageIgnore
 */
class HttpStatusCode
{
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NO_CONTENT = 204;
    const MULTIPLE_CHOICES = 300;
    const MOVED_PERMANENTLY = 301;
    const FOUND = 302;
    const PERMANENT_REDIRECT = 301;
    const TEMPORARY_REDIRECT = 302;
    const SEE_OTHER = 303;
    const NOT_MODIFIED = 304;
    const PERMANENT_REDIRECT_REAL = 307;
    const TEMPORARY_REDIRECT_REAL = 308;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const NOT_LICENSED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const CONFLICT = 409;
    const GONE = 410;
    const PRECONDITION_FAILED = 412;
    const PAYLOAD_TOO_LARGE = 413;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const TOO_MANY_REQUESTS = 429;
    const INTERNAL_SERVER_ERROR = 500;
    const BAD_GATEWAY = 502;
    const SERVICE_UNAVAILABLE = 503;
    const GATEWAY_TIMEOUT = 504;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;
}
