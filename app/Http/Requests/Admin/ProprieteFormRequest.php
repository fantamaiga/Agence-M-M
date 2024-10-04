<?php

namespace App\Http\Requests\Admin ;

use Illuminate\Foundation\Http\FormRequest;

class ProprieteFormRequest extends FormRequest
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
            'titre' => ['required', 'min:3'],
            'type' => ['required', 'min:5'],
            'description' => ['required','min:10'],
            'surface' => ['required', 'integer','min:5'],
            'nombre_pieces' => ['required', 'integer','min:1'],
            'nombre_chambres' => ['required', 'integer','min:0'],
            'num_etage' => ['required', 'integer','min:0'],
            'prix' => ['required', 'integer','min:0'],
            'ville' => ['required','min:3'],
            'quartier' => ['required','min:3'],
            'statut' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id','required'],
        ];
    }
}
