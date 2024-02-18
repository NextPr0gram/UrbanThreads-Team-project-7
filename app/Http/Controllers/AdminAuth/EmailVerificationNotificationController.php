<?php

namespace App\Http\Controllers\AdminAuth;

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
        if ($request->admin()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
        }

        $request->admin()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
