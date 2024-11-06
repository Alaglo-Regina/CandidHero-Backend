<?php

namespace App\Http\Requests\Offres;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOffreRequest extends FormRequest
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
            'title' => 'required|min:3|max:128|unique:offres',
            'experience' => 'required|string',
            'domaine' => 'required|string',
            'NbreRecruit' => 'required|integer|min:1',        
            'contrat' => 'required|string|in:CDD,CDI,Stage',
            'salaire' => 'required|integer|min:0',
            'criteres' => 'required|string',
            'ville' => 'required|string',
            'dateLimite' => 'required|date|after:today',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Erreurs de validation',
            'data'      => $validator->errors()
        ], 422));
    }
    

    public function messages()
    {
        return [
            'title.required' => 'Le titre de votre offre est requis',
            'title.min' => 'Le titre de votre offre doit contenir au moins 3 caractères',
            'title.max' => 'Le titre de votre offre ne doit pas contenir plus de 128 caractères',
            // 'title.unique' => 'une offre du même titre existe déjà '
        ];
    }

}