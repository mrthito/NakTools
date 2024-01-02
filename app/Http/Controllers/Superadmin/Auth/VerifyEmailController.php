<?php

namespace App\Http\Controllers\Superadmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user('superadmin')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::SUPERADMIN . '?verified=1');
        }

        if ($request->user('superadmin')->markEmailAsVerified()) {
            event(new Verified($request->user('superadmin')));
        }

        return redirect()->intended(RouteServiceProvider::SUPERADMIN . '?verified=1');
    }
}
