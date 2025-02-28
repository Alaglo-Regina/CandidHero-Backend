<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:3|max:128|email',
            'password' => 'required|min:6|max:64',
        ];
    }
    public function messages(): array
    {
        return [
            'email.email' => 'L\'adresse email est invalide.',
            'email.required' => 'L\'adresse email est requis.',
            'email.min' => 'L\'adresse email doit contenir plus de 3 caractères.',
            'email.max' => 'L\'adresse email doit contenir moins de 128 caratères.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir plus de 6 caractères.',
            'password.max' => 'Le mot de passe doit contenir moins de 64 caractères.',
        ];
    }
}
