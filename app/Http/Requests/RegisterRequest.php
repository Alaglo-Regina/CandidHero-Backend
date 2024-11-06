<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            // 'name' => 'required|min:3|max:128|unique:users',
            // 'email' => 'required|min:3|max:128|unique:users',
            'password' => 'required|min:6|max:64',
            'passwordConfirm' => 'same:password',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Le nom est requis.',
            'name.min' => 'Le nom doit contenir plus de 3 caractères.',
            'name.max' => 'Le nom doit contenir moins de 128 caratères.',
            'email.required' => 'L\'adresse email est requise',
            'email.min' => 'L\'adresse email doit contenir plus de 6 caractères.',
            'email.max' => 'L\'adresse email doit contenir moins de 64 caractères.',
            'email.email' => 'L\'adresse email est invalide.',
            'email.unique' => 'L\'email est déjà utilisé.',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir plus de 6 caractères.',
            'password.max' => 'Le mot de passe doit contenir moins de 64 caractères',
            'passwordConfirm.same' => 'Les deux mots de passe ne sont pas identiques',
        ];
    }
}