<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssocAttributChampRequest extends FormRequest
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
			'champ_formulaire_id' => 'required',
			'attribut_type_champ_id' => 'required',
			'Valeur' => 'string',
        ];
    }
}
