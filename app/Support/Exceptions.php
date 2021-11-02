<?php

namespace App\Support;

use Exception;

class Exceptions
{
    public static function badRequest(string $message)
    {
        throw new Exception($message, 400);
    }

    public static function unauthorized(string $message)
    {
        throw new Exception($message, 401);
    }

    public static function paymentRequired(string $message)
    {
        throw new Exception($message, 402);
    }

    public static function forbidden(string $message)
    {
        throw new Exception($message, 403);
    }

    public static function notFound(string $message)
    {
        throw new Exception($message, 404);
    }

    public static function notAcceptable(string $message)
    {
        throw new Exception($message, 406);
    }

    public static function proxyAuthenticationRequired(string $message)
    {
        throw new Exception($message, 407);
    }

    public static function requestTimeout(string $message)
    {
        throw new Exception($message, 408);
    }

    public static function conflict(string $message)
    {
        throw new Exception($message, 409);
    }

    public static function gone(string $message)
    {
        throw new Exception($message, 410);
    }

    public static function preconditionFailed(string $message)
    {
        throw new Exception($message, 412);
    }

    public static function unsupportedMediaType(string $message)
    {
        throw new Exception($message, 415);
    }

    public static function unprocessableEntity(string $message)
    {
        throw new Exception($message, 422);
    }

    public static function internalServerError(string $message)
    {
        throw new Exception($message, 500);
    }

    public static function notImplemented(string $message)
    {
        throw new Exception($message, 501);
    }

    public static function insufficientStorage(string $message)
    {
        throw new Exception($message, 507);
    }
}
