<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'publisher_id' => ['required', 'exists:publishers,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'genres' => ['required', 'array'],
            'genres.*' => ['required', 'exists:genres,id'],
            'authors' => ['required', 'array'],
            'authors.*' => ['required', 'exists:authors,id'],   
        ];
    }
}
