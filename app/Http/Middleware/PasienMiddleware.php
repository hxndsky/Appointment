<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasienMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
