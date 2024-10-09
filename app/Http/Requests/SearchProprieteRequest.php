<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProprieteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Autoriser toutes les requêtes
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'prix' => ['numeric', 'gte:0', 'nullable'],
            'surface' => ['numeric', 'gte:0', 'nullable'],
            'nombre_pieces' => ['numeric', 'gte:0', 'nullable'],
            'titre' => ['string', 'nullable', 'min:3'], // Ajout d'une règle de longueur minimale
        ];
    }

    /**
     * Get the custom validation messages for the rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'prix.numeric' => 'Le prix doit être un nombre.',
            'prix.gte' => 'Le prix doit être supérieur ou égal à zéro.',
            'surface.numeric' => 'La surface doit être un nombre.',
            'surface.gte' => 'La surface doit être supérieure ou égale à zéro.',
            'nombre_pieces.numeric' => 'Le nombre de pièces doit être un nombre.',
            'nombre_pieces.gte' => 'Le nombre de pièces doit être supérieur ou égal à zéro.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.min' => 'Le titre doit contenir au moins 3 caractères.',
        ];
    }
}
