<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\Common\Country;
use App\Models\Common\Staff;
use App\Models\Common\User as CommonUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\PhoneNumberRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
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
        return view('auth.register', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', new PhoneNumberRule],
            'country_code' => ['required', 'numeric'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Staff::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Staff::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone' => $request->country_code . '-' . $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('web')->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
