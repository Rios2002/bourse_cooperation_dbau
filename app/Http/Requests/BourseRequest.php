<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BourseRequest extends FormRequest
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
            'CodePays' => 'required|string|exists:pays,CodePays',
            "CodeAnneeAcademique" => 'required|string|exists:annee_academiques,CodeAnneeAcademique',
            'LibelleBourse' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Communique' => 'required|file|max:10240|mimes:pdf',
            'isDisponible' => 'required|boolean',
            'DateOuverture' => 'required|date',
            'DateFermeture' => 'required|date|after:DateOuverture',
            'Quota' => 'required|integer|min:1',
        ];
    }
}
