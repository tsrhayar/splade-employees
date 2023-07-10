<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'lastname' => ['required', 'string', 'min:2', 'max:60'],
            'firstname' => ['required', 'string', 'min:2', 'max:60'],
            'middle_name' => ['required', 'string', 'min:2', 'max:60'],
            'adress' => ['required', 'string', 'min:10', 'max:60'],
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'zip_code' => ['required', 'min:5', 'max:10'],
            'birthdate' => ['required', 'date'],
            'date_hired' => ['required', 'date']
        ];
    }
}