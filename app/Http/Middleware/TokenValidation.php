<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class TokenValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( !$request->hasHeader("api_token") ) {
            return response()->json("Unauthorized", 401);
        }
        $user = User::where("remember_token", "=", $request->header("api_token"))
                    ->first();

        if( is_null($user) ) {
            return response()->json("Forbidden", 403);
        }

        $request->replace(array_merge($request->all(), ["user" => $user]));

        return $next($request);
    }
}
