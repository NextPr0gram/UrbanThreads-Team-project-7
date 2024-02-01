<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Address;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function addOrUpdateAddress(Request $request)
    {
        // Validation rules for the address
        $addressValidation = [
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'county' => 'required',
            'postcode' => 'required',
        ];
        // Get the user and their address
        $user = auth()->user();
        $address = $user->address;
        // If the user already has an address then update it
        if ($address) {
            $address->update($request->validate($addressValidation));
        } else {
            // Otherwise create a new address
            $address = Address::create($request->validate($addressValidation));
        }
        // Update the user's address_id
        $user->address_id = $address->id;
        // Save the user
        $request->user()->save();
        // Redirect back to the profile page
        return Redirect::route('profile.edit')->with('status', 'address-updated');
    }
}
