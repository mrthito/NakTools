<?php

namespace App\Http\Requests\Superadmin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//Auth::guard('superadmin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:staffs,email', 'max:255'],
            'phone' => ['required', 'unique:staffs,phone', 'regex:/^\+[0-9]{1,3}[0-9]{9}$/'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'The phone number must be in international format. Ex: +919876543210',
        ];
    }
}
