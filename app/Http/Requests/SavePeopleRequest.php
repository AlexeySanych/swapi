<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePeopleRequest extends FormRequest
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
            'name' => 'min:1',
            'hair_color' => 'min:1',
            'height' => 'integer|min:1',
            'mass' => 'numeric|min:1',
            'birth_year' => 'min:1',
            'homeworld_id' => 'integer',
            'gender_id' => 'integer',
            'films' => 'array',
            'films.*' => 'integer',
            'images' => 'array',
            'images.*' => 'file|mimes:jpg,png',
            'del-images' => 'array',
        ];
    }
}
