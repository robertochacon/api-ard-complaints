<?php

namespace App\Http\Middleware;

use Closure;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(Exception $e){
            return response()->json(["msg"=>"token not found"]);
        }

        return $next($request);
    }
}
