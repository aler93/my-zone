<?php


namespace App\Support;


class HttpStatus
{
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
    // Informational responses 100-199
    public static int $statusContinue                      = 100; // RFC 7231, 6.2.1
    public static int $statusSwitchingProtocols            = 101; // RFC 7231, 6.2.2
    public static int $statusProcessing                    = 102; // RFC 2518, 10.1
    public static int $statusEarlyHints                    = 103; // RFC 8297
    // Successful responses 200- 299
    public static int $statusOK                            = 200; // RFC 7231, 6.3.1
    public static int $statusCreated                       = 201; // RFC 7231, 6.3.2
    public static int $statusAccepted                      = 202; // RFC 7231, 6.3.3
    public static int $statusNonAuthoritativeInfo          = 203; // RFC 7231, 6.3.4
    public static int $statusNoContent                     = 204; // RFC 7231, 6.3.5
    public static int $statusResetContent                  = 205; // RFC 7231, 6.3.6
    public static int $statusPartialContent                = 206; // RFC 7233, 4.1
    public static int $statusMultiStatus                   = 207; // RFC 4918, 11.1
    public static int $statusAlreadyReported               = 208; // RFC 5842, 7.1
    public static int $statusIMUsed                        = 226; // RFC 3229, 10.4.1
    // Redirects 300-399
    public static int $statusMultipleChoices               = 300; // RFC 7231, 6.4.1
    public static int $statusMovedPermanently              = 301; // RFC 7231, 6.4.2
    public static int $statusFound                         = 302; // RFC 7231, 6.4.3
    public static int $statusSeeOther                      = 303; // RFC 7231, 6.4.4
    public static int $statusNotModified                   = 304; // RFC 7232, 4.1
    public static int $statusUseProxy                      = 305; // RFC 7231, 6.4.5
    public static int $statusTemporaryRedirect             = 307; // RFC 7231, 6.4.7
    public static int $statusPermanentRedirect             = 308; // RFC 7538, 3
    // Client errors 400-499
    public static int $statusBadRequest                    = 400; // RFC 7231, 6.5.1
    public static int $statusUnauthorized                  = 401; // RFC 7235, 3.1
    public static int $statusPaymentRequired               = 402; // RFC 7231, 6.5.2
    public static int $statusForbidden                     = 403; // RFC 7231, 6.5.3
    public static int $statusNotFound                      = 404; // RFC 7231, 6.5.4
    public static int $statusMethodNotAllowed              = 405; // RFC 7231, 6.5.5
    public static int $statusNotAcceptable                 = 406; // RFC 7231, 6.5.6
    public static int $statusProxyAuthRequired             = 407; // RFC 7235, 3.2
    public static int $statusRequestTimeout                = 408; // RFC 7231, 6.5.7
    public static int $statusConflict                      = 409; // RFC 7231, 6.5.8
    public static int $statusGone                          = 410; // RFC 7231, 6.5.9
    public static int $statusLengthRequired                = 411; // RFC 7231, 6.5.10
    public static int $statusPreconditionFailed            = 412; // RFC 7232, 4.2
    public static int $statusRequestEntityTooLarge         = 413; // RFC 7231, 6.5.11
    public static int $statusRequestURITooLong             = 414; // RFC 7231, 6.5.12
    public static int $statusUnsupportedMediaType          = 415; // RFC 7231, 6.5.13
    public static int $statusRequestedRangeNotSatisfiable  = 416; // RFC 7233, 4.4
    public static int $statusExpectationFailed             = 417; // RFC 7231, 6.5.14
    public static int $statusTeapot                        = 418; // RFC 7168, 2.3.3
    public static int $statusMisdirectedRequest            = 421; // RFC 7540, 9.1.2
    public static int $statusUnprocessableEntity           = 422; // RFC 4918, 11.2
    public static int $statusLocked                        = 423; // RFC 4918, 11.3
    public static int $statusFailedDependency              = 424; // RFC 4918, 11.4
    public static int $statusTooEarly                      = 425; // RFC 8470, 5.2.
    public static int $statusUpgradeRequired               = 426; // RFC 7231, 6.5.15
    public static int $statusPreconditionRequired          = 428; // RFC 6585, 3
    public static int $statusTooManyRequests               = 429; // RFC 6585, 4
    public static int $statusRequestHeaderFieldsTooLarge   = 431; // RFC 6585, 5
    public static int $statusUnavailableForLegalReasons    = 451; // RFC 7725, 3
    // Server erros 500-599
    public static int $statusInternalServerError           = 500; // RFC 7231, 6.6.1
    public static int $statusNotImplemented                = 501; // RFC 7231, 6.6.2
    public static int $statusBadGateway                    = 502; // RFC 7231, 6.6.3
    public static int $statusServiceUnavailable            = 503; // RFC 7231, 6.6.4
    public static int $statusGatewayTimeout                = 504; // RFC 7231, 6.6.5
    public static int $statusHTTPVersionNotSupported       = 505; // RFC 7231, 6.6.6
    public static int $statusVariantAlsoNegotiates         = 506; // RFC 2295, 8.1
    public static int $statusInsufficientStorage           = 507; // RFC 4918, 11.5
    public static int $statusLoopDetected                  = 508; // RFC 5842, 7.2
    public static int $statusNotExtended                   = 510; // RFC 2774, 7
    public static int $statusNetworkAuthenticationRequired = 511; // RFC 6585, 6

    // Get: The HTTP GET method requests a representation of the specified resource.
    // Requests using GET should only be used to request data (they shouldn't include data).
    public static string $get = "GET";

    // Post: The HTTP POST method sends data to the server.
    // The type of the body of the request is indicated by the Content-Type header.
    public static string $post = "POST";

    // Put: The HTTP PUT request method creates a new resource or replaces a representation of the target
    // resource with the request payload.
    public static string $put = "PUT";

    // Head: The HTTP HEAD method requests the headers that would be returned if the HEAD request's URL was instead
    // requested with the HTTP GET method.
    // For example, if a URL might produce a large download, a HEAD request could read its Content-Length header
    // to check the filesize without actually downloading the file.
    public static string $head = "HEAD";

    // Delete: The HTTP DELETE request method deletes the specified resource.
    public static string $delete = "DELETE";

    // Patch: The HTTP PATCH request method applies partial modifications to a resource.
    public static string $patch = "PATCH";

    // Options: The HTTP OPTIONS method requests permitted communication options for a given URL or server.
    // A client can specify a URL with this method, or an asterisk (*) to refer to the entire server.
    public static string $options = "OPTIONS";

    // Connect: The HTTP CONNECT method starts two-way communications with the requested resource.
    // It can be used to open a tunnel.
    public static string $connect = "CONNECT";

    // Trace: The HTTP TRACE method performs a message loop-back test along the path to the target resource,
    // providing a useful debugging mechanism.
    public static string $trace = "TRACE";

    public static function statusMessage(int $status): string
    {
        $messages = [
            self::$statusContinue                      => "Continue",
            self::$statusSwitchingProtocols            => "Switching Protocols",
            self::$statusProcessing                    => "Processing",
            self::$statusEarlyHints                    => "Early Hints",
            self::$statusOK                            => "Ok",
            self::$statusCreated                       => "Created",
            self::$statusAccepted                      => "Accepted",
            self::$statusNonAuthoritativeInfo          => "Non Authoritative Info",
            self::$statusNoContent                     => "No Content",
            self::$statusResetContent                  => "Reset Content",
            self::$statusPartialContent                => "Partial Content",
            self::$statusMultiStatus                   => "Multi Status",
            self::$statusAlreadyReported               => "Already Reported",
            self::$statusIMUsed                        => "IM Used",
            self::$statusMultipleChoices               => "Multiple Choices",
            self::$statusMovedPermanently              => "Moved Permanently",
            self::$statusFound                         => "Found",
            self::$statusSeeOther                      => "See Other",
            self::$statusNotModified                   => "Not Modified",
            self::$statusUseProxy                      => "Use Proxy",
            self::$statusTemporaryRedirect             => "Temporary Redirect",
            self::$statusPermanentRedirect             => "Permanent Redirect",
            self::$statusBadRequest                    => "Bad Request",
            self::$statusUnauthorized                  => "Unauthorized",
            self::$statusPaymentRequired               => "Payment Required",
            self::$statusForbidden                     => "Forbidden",
            self::$statusNotFound                      => "Not Found",
            self::$statusMethodNotAllowed              => "Method Not Allowed",
            self::$statusNotAcceptable                 => "Not Acceptable",
            self::$statusProxyAuthRequired             => "Proxy Auth Required",
            self::$statusRequestTimeout                => "Request Timeout",
            self::$statusConflict                      => "Conflict",
            self::$statusGone                          => "Gone",
            self::$statusLengthRequired                => "Length Required",
            self::$statusPreconditionFailed            => "Precondition Failed",
            self::$statusRequestEntityTooLarge         => "Request Entity Too Large",
            self::$statusRequestURITooLong             => "Request URI Too Long",
            self::$statusUnsupportedMediaType          => "Unsupported Media Type",
            self::$statusRequestedRangeNotSatisfiable  => "Requested Range Not Satisfiable",
            self::$statusExpectationFailed             => "Expectation Failed",
            self::$statusTeapot                        => "Teapot",
            self::$statusMisdirectedRequest            => "Misdirected Request",
            self::$statusUnprocessableEntity           => "Unprocessable Entity",
            self::$statusLocked                        => "Locked",
            self::$statusFailedDependency              => "Failed Dependency",
            self::$statusTooEarly                      => "Too Early",
            self::$statusUpgradeRequired               => "Upgrade Required",
            self::$statusPreconditionRequired          => "Precondition Required",
            self::$statusTooManyRequests               => "TooManyRequests",
            self::$statusRequestHeaderFieldsTooLarge   => "Request Header Fields Too Large",
            self::$statusUnavailableForLegalReasons    => "Unavailable For Legal Reasons",
            self::$statusInternalServerError           => "Internal Server Error",
            self::$statusNotImplemented                => "Not Implemented",
            self::$statusBadGateway                    => "Bad Gateway",
            self::$statusServiceUnavailable            => "Service Unavailable",
            self::$statusGatewayTimeout                => "Gateway timeout",
            self::$statusHTTPVersionNotSupported       => "HTTP Version Not Supported",
            self::$statusVariantAlsoNegotiates         => "Variant Also Negotiates",
            self::$statusInsufficientStorage           => "Insufficient Storage",
            self::$statusLoopDetected                  => "Loop Detected",
            self::$statusNotExtended                   => "Not Extended",
            self::$statusNetworkAuthenticationRequired => "Network Authentication Required"
        ];

        return $messages[$status];
    }

    public static function getStatusList(): array
    {
        return [
            self::$statusContinue,
            self::$statusSwitchingProtocols,
            self::$statusProcessing,
            self::$statusEarlyHints,
            self::$statusOK,
            self::$statusCreated,
            self::$statusAccepted,
            self::$statusNonAuthoritativeInfo,
            self::$statusNoContent,
            self::$statusResetContent,
            self::$statusPartialContent,
            self::$statusMultiStatus,
            self::$statusAlreadyReported,
            self::$statusIMUsed,
            self::$statusMultipleChoices,
            self::$statusMovedPermanently,
            self::$statusFound,
            self::$statusSeeOther,
            self::$statusNotModified,
            self::$statusUseProxy,
            self::$statusTemporaryRedirect,
            self::$statusPermanentRedirect,
            self::$statusBadRequest,
            self::$statusUnauthorized,
            self::$statusPaymentRequired,
            self::$statusForbidden,
            self::$statusNotFound,
            self::$statusMethodNotAllowed,
            self::$statusNotAcceptable,
            self::$statusProxyAuthRequired,
            self::$statusRequestTimeout,
            self::$statusConflict,
            self::$statusGone,
            self::$statusLengthRequired,
            self::$statusPreconditionFailed,
            self::$statusRequestEntityTooLarge,
            self::$statusRequestURITooLong,
            self::$statusUnsupportedMediaType,
            self::$statusRequestedRangeNotSatisfiable,
            self::$statusExpectationFailed,
            self::$statusTeapot,
            self::$statusMisdirectedRequest,
            self::$statusUnprocessableEntity,
            self::$statusLocked,
            self::$statusFailedDependency,
            self::$statusTooEarly,
            self::$statusUpgradeRequired,
            self::$statusPreconditionRequired,
            self::$statusTooManyRequests,
            self::$statusRequestHeaderFieldsTooLarge,
            self::$statusUnavailableForLegalReasons,
            self::$statusInternalServerError,
            self::$statusNotImplemented,
            self::$statusBadGateway,
            self::$statusServiceUnavailable,
            self::$statusGatewayTimeout,
            self::$statusHTTPVersionNotSupported,
            self::$statusVariantAlsoNegotiates,
            self::$statusInsufficientStorage,
            self::$statusLoopDetected,
            self::$statusNotExtended,
            self::$statusNetworkAuthenticationRequired,
        ];
    }
}
