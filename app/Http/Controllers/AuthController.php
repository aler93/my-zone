<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\Exceptions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        try {
            $user = User::where("email", "=", $request->input("email"))
                        ->where("password", "=", $request->input("password"))
                        ->first();

            if( is_null($user) ) {
                Exceptions::unauthorized("e-mail and password combination not found");
            }

            // Simple token solution, for production something more robust - like JWT - should be considered
            $user->remember_token = uuid();
            $user->save();

            return $this->json(["api_token" => $user->remember_token], 202);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            if( !$request->hasHeader("api_token") ) {
                Exceptions::badRequest("API Token not provided");
            }

            $user = User::where("remember_token", "=", $request->header("api_token"))
                        ->first();

            if( is_null($user) ) {
                Exceptions::notFound("User not found with token provided");
            }

            // Simple token solution, for production something more robust - like JWT - should be considered
            $user->remember_token = null;
            $user->save();

            return $this->json([], 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
