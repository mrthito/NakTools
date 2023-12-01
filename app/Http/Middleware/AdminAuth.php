<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentIp = $request->ip();
        $allowedIps = explode(',', config('auth.superadmin.allowed_ips'));
        if (!in_array($currentIp, $allowedIps)) {
            abort(403);
        }
        return $next($request);
    }
}
