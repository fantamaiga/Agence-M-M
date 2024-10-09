<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProprieteContactRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'min:2'], 
            'lastname' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string', 'between:10,15'], // Validation de la longueur du téléphone
            'email' => ['required', 'email', 'min:4'],
            'message' => ['required', 'string', 'min:6'],
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
            'firstname.required' => 'Le prénom est requis.',
            'firstname.min' => 'Le prénom doit contenir au moins 2 caractères.',
            'lastname.required' => 'Le nom de famille est requis.',
            'lastname.min' => 'Le nom de famille doit contenir au moins 2 caractères.',
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.between' => 'Le numéro de téléphone doit contenir entre 10 et 15 caractères.',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'message.required' => 'Le message est requis.',
            'message.min' => 'Le message doit contenir au moins 6 caractères.',
        ];
    }
}
