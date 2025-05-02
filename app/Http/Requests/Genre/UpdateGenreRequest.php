<?php

namespace App\Http\Requests\Genre;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
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
        // Retrieve the genre ID from the route parameter
        $genreId = $this->route('genre'); 

        return [
            'name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('genres', 'name')->ignore($genreId),
            ]
        ];
    }
}
