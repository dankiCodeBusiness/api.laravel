<?php

namespace App\Http\Middleware;

use Closure;

class BasicAthenticationMiddleware
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
        $env =  'Bearer 123456';
        if ($request->header('authorization') !== $env) {
          return response()->json(['message' => 'Não autenticado'], 401);
        }
        return $next($request);
    }
}
