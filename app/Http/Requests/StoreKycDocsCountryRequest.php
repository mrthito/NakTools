<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKycDocsCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guard('superadmin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'nullable|exists:states,id',
            'name' => 'required|string|max:255',
            'required' => 'nullable|boolean',
            'has_id_number' => 'nullable|boolean',
            'id_required' => 'nullable|boolean',
            'id_regex' => 'nullable|string|max:255',
            'has_name' => 'nullable|boolean',
            'name_required' => 'nullable|boolean',
            'has_expiration_date' => 'nullable|boolean',
            'expiration_date_required' => 'nullable|boolean',
            'number_of_pages' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'country_id.required' => 'The country field is required.',
            'country_id.exists' => 'The selected country is invalid.',
            'state_id.exists' => 'The selected state is invalid.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'required.required' => 'The required document field is required.',
            'has_id_number.required' => 'The has id number field is required.',
            'id_required.required' => 'The id required field is required.',
            'has_name.required' => 'The has name field is required.',
            'name_required.required' => 'The name required field is required.',
            'has_expiration_date.required' => 'The has expiration date field is required.',
            'expiration_date_required.required' => 'The expiration date required field is required.',
            'number_of_pages.integer' => 'The number of pages must be an integer.',
            'number_of_pages.min' => 'The number of pages must be at least 0.',
        ];
    }
}
