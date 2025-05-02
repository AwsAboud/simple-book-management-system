<?php

namespace App\Http\Requests\Country;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retrieve the country ID from the route parameter
        $countryId = $this->route('country');

        return [
            'country_name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('countries', 'country_name')->ignore($countryId),
            ],
            'nationality' => [
                'sometimes',
                'string',
                'max:255',
            ],
            'alpha2_code' => [
                'sometimes',
                'string',
                'size:2',
            ],
            'alpha3_code' => [
                'sometimes',
                'string',
                'size:3',
            ],
        ];
    }
}
