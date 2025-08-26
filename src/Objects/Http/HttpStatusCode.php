<?php

namespace EncoreDigitalGroup\StdLib\Objects\Http;

/** @codeCoverageIgnore */
class HttpStatusCode
{
    public const int OK = 200;
    public const int CREATED = 201;
    public const int ACCEPTED = 202;
    public const int NO_CONTENT = 204;
    public const int MULTIPLE_CHOICES = 300;
    public const int MOVED_PERMANENTLY = 301;
    public const int FOUND = 302;
    public const int PERMANENT_REDIRECT = 301;
    public const int TEMPORARY_REDIRECT = 302;
    public const int SEE_OTHER = 303;
    public const int NOT_MODIFIED = 304;
    public const int PERMANENT_REDIRECT_REAL = 307;
    public const int TEMPORARY_REDIRECT_REAL = 308;
    public const int BAD_REQUEST = 400;
    public const int UNAUTHORIZED = 401;
    public const int PAYMENT_REQUIRED = 402;
    public const int NOT_LICENSED = 402;
    public const int FORBIDDEN = 403;
    public const int NOT_FOUND = 404;
    public const int METHOD_NOT_ALLOWED = 405;
    public const int NOT_ACCEPTABLE = 406;
    public const int REQUEST_TIMEOUT = 408;
    public const int CONFLICT = 409;
    public const int GONE = 410;
    public const int PRECONDITION_FAILED = 412;
    public const int PAYLOAD_TOO_LARGE = 413;
    public const int UNSUPPORTED_MEDIA_TYPE = 415;
    public const int UNPROCESSABLE_CONTENT = 422;
    public const int PRECONDITION_REQUIRED = 428;
    public const int TOO_MANY_REQUESTS = 429;
    public const int UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    public const int INTERNAL_SERVER_ERROR = 500;
    public const int NOT_IMPLEMENTED = 501;
    public const int BAD_GATEWAY = 502;
    public const int SERVICE_UNAVAILABLE = 503;
    public const int GATEWAY_TIMEOUT = 504;
    public const int INSUFFICIENT_STORAGE = 507;
    public const int NETWORK_AUTHENTICATION_REQUIRED = 511;
}
