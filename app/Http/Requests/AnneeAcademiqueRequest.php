<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnneeAcademiqueRequest extends FormRequest
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

        $CodeAnneeAcademique = $this->route('annee-academiques') ? $this->route('annee-academiques')->CodeAnneeAcademique : null;
        return [

            "AnneeDebut" => 'required|integer|unique:annee_academiques,AnneeDebut,' . $CodeAnneeAcademique . ',CodeAnneeAcademique|min:1900|regex:/^\d{4}$/',
        ];
    }
}
