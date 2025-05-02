<?php

namespace App\Http\Requests\Country;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('countries', 'country_name'),
            ],
            'nationality' => [
                'required',
                'string',
                'max:255',
            ],
            'alpha2_code' => [
                'required',
                'string',
                'size:2',
            ],
            'alpha3_code' => [
                'required',
                'string',
                'size:3',
            ],
        ];
    }
}
