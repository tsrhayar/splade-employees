<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => ['required', 'string', 'max:60', Rule::unique('countries', 'name')->ignore($this->country->id)],
            'country_code' => ['required', 'string', 'max:3', Rule::unique('countries', 'country_code')->ignore($this->country->id)],
        ];
    }
}
