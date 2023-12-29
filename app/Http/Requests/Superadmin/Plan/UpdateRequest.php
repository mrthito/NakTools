<?php

namespace App\Http\Requests\Superadmin\Plan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'interval' => 'required|integer|min:1',
            'interval_type' => 'required',
            'trial_period_days' => 'nullable|integer|min:1',
            'featured' => 'nullable|boolean',
            'status' => 'required',
            'free' => 'nullable|boolean',
        ];
    }
}
