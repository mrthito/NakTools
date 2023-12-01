<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Staff
        if (!$request->expectsJson() && $request->is('staff*')) {
            return route('staff.login');
        }
        // Super Admin
        if (!$request->expectsJson() && $request->is('superadmin*')) {
            return route('superadmin.login');
        }
        return $request->expectsJson() ? null : route('login');
    }
}
