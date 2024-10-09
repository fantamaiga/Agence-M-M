<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProprieteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Autoriser toutes les requêtes pour l'instant
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['required', 'string', 'min:3'],
            'type' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'min:10'],
            'surface' => ['required', 'integer', 'min:5'],
            'nombre_pieces' => ['required', 'integer', 'min:1'],
            'nombre_chambres' => ['required', 'integer', 'min:0'],
            'num_etage' => ['required', 'integer', 'min:0'],
            'prix' => ['required', 'numeric', 'min:0'], // Changement à 'numeric'
            'ville' => ['required', 'string', 'min:3'],
            'quartier' => ['required', 'string', 'min:3'],
            'statut' => ['required', 'boolean'],
            'options' => ['required', 'array', 'exists:options,id', 'min:1'], // Validation pour le tableau non vide
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
            'titre.required' => 'Le titre est requis.',
            'titre.min' => 'Le titre doit contenir au moins 3 caractères.',
            'type.required' => 'Le type est requis.',
            'type.min' => 'Le type doit contenir au moins 5 caractères.',
            'description.required' => 'La description est requise.',
            'description.min' => 'La description doit contenir au moins 10 caractères.',
            'surface.required' => 'La surface est requise.',
            'surface.integer' => 'La surface doit être un nombre entier.',
            'surface.min' => 'La surface doit être d\'au moins 5.',
            'nombre_pieces.required' => 'Le nombre de pièces est requis.',
            'nombre_pieces.integer' => 'Le nombre de pièces doit être un nombre entier.',
            'nombre_pieces.min' => 'Le nombre de pièces doit être d\'au moins 1.',
            'nombre_chambres.required' => 'Le nombre de chambres est requis.',
            'nombre_chambres.integer' => 'Le nombre de chambres doit être un nombre entier.',
            'num_etage.required' => 'Le numéro d\'étage est requis.',
            'num_etage.integer' => 'Le numéro d\'étage doit être un nombre entier.',
            'prix.required' => 'Le prix est requis.',
            'prix.numeric' => 'Le prix doit être un nombre.',
            'prix.min' => 'Le prix ne peut pas être négatif.',
            'ville.required' => 'La ville est requise.',
            'ville.min' => 'La ville doit contenir au moins 3 caractères.',
            'quartier.required' => 'Le quartier est requis.',
            'quartier.min' => 'Le quartier doit contenir au moins 3 caractères.',
            'statut.required' => 'Le statut est requis.',
            'options.required' => 'Les options sont requises.',
            'options.exists' => 'Une ou plusieurs options sélectionnées n\'existent pas.',
            'options.min' => 'Veuillez sélectionner au moins une option.',
        ];
    }
}
