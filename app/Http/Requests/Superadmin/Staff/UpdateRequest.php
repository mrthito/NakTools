<?php

namespace App\Http\Requests\Superadmin\Staff;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('superadmin')->check();
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
            'email' => ['required', 'email', "unique:staffs,email,{$this->staff->id}", 'max:255'],
            'phone' => ['required', "unique:staffs,phone,{$this->staff->id}", 'regex:/^\+[0-9]{1,3}[0-9]{9}$/'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'The email has already been taken.',
            'phone.regex' => 'The phone number must be in international format. Ex: +919876543210',
            'phone.unique' => 'The phone number has already been taken.',
        ];
    }
}
