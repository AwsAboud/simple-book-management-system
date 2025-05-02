<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePublisherRequest extends FormRequest
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
        $publisherId = $this->route('publisher');

        return [
            'country_id' => ['sometimes', 'exists:countries,id'],
            'name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('publishers', 'name')->ignore($publisherId)
            ],
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('publishers', 'email')->ignore($publisherId)
            ]
        ];
    }
}
