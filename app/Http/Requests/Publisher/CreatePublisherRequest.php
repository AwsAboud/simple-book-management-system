<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePublisherRequest extends FormRequest
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
            'country_id' => ['required', 'exists:countries,id'],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('publishers', 'name')
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('publishers', 'email')
            ]
        ];
    }
}
