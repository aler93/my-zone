<?php

namespace App\Http\Controllers;

use App\Support\HttpStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json($data, int $status = 200): JsonResponse
    {
        if( !in_array($status, HttpStatus::getStatusList()) ) {
            $status = 500;
        }

        return response()->json($data, $status);
    }

    public function jsonException(Throwable $e, int $status = 500): JsonResponse
    {
        if( $e->getCode() > 0 ) {
            $status = (int) $e->getCode();
        }

        if( !in_array($status, HttpStatus::getStatusList()) ) {
            $status = 500;
        }

        $response = [
            "title"   => "Unexpected error",
            "message" => $e->getMessage(),
            "status"  => $status
        ];

        if( env("APP_DEBUG") ) {
            $response["file"]  = $e->getFile();
            $response["line"]  = $e->getLine();
            $response["trace"] = $e->getTrace();
        }

        return $this->json($response, $status);
    }
}
