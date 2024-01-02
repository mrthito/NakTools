<?php

namespace App\Http\Controllers\Superadmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user('superadmin')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::SUPERADMIN);
        }

        $request->user('superadmin')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
