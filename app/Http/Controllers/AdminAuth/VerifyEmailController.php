<?php

namespace App\Http\Controllers\AdminAuth;

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
        if ($request->admin()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD.'?verified=1');
        }

        if ($request->admin()->markEmailAsVerified()) {
            event(new Verified($request->admin()));
        }

        return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD.'?verified=1');
    }
}
