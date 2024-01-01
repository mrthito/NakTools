<?php

namespace App\Http\Requests;

use App\Models\Common\User as CommonUser;
use App\Models\User;
use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(CommonUser::class)->ignore($this->user()->id)],
            'phone_number' => ['required', 'numeric', new PhoneNumberRule],
            'country_code' => ['required', 'numeric'],
        ];
    }
}
