<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Common\Country;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $preCountry = [];
        $countries = [];
        $allCountries = Country::orderBy('phone_code')
            ->get(['id', 'phone_code']);
        if ($allCountries->count() > 0) {
            foreach ($allCountries as $country) {
                if (!in_array($country->phone_code, $preCountry)) {
                    $preCountry[] = $country->phone_code;
                    $countries[] = $country;
                }
            }
        }
        $user = $request->user();
        $phone = explode('-', $user->phone);
        $user->phone_code = $phone[0] ?? '';
        $user->phone = $phone[1] ?? $user->phone;
        return view('profile.edit', [
            'user' => $user,
            'countries' => $countries,
        ]);
    }

    /**
     * UpdateRequest the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->country_code . '-' . $request->phone_number;
        $user->email = $request->email;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('u.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password1' => ['required', 'current_password'],
        ], [
            'password1.required' => 'The password field is required.',
            'password1.current_password' => 'The password is incorrect.',
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
