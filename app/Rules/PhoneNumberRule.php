<?php

namespace App\Rules;

use App\Models\Common\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumberRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (request()->has('country_code')) {
            $check = User::where('phone', request()->country_code . '-' . $value)
                ->when(request()->has('user_id'), function ($query) {
                    $query->where('id', '!=', request()->user_id);
                })
                ->exists();
            if ($check) {
                $fail('The phone number has already been taken.');
            }
        } else {
            $check = User::where('phone', $value)
                ->when(request()->has('user_id'), function ($query) {
                    $query->where('id', '!=', request()->user_id);
                })
                ->exists();
            if ($check) {
                $fail('The phone number has already been taken.');
            }
        }
    }
}
