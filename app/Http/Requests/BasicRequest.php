<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicRequest extends FormRequest
{
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
            'name' => 'required|min:3|max:30'
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => 'A név mezőt kötelező kitölteni!',
        'name.min' => 'A név legalább 3 karakter hosszú kell legyen!',
        'name.max' => 'A név hosszabb a megengedettnél!',
        ];
    }

}
