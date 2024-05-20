<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeRequest extends FormRequest
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
			'bourse_id' => 'required',
			'user_id' => 'required',
			'Code' => 'string',
			'NPI' => 'string',
			'Nom' => 'string',
			'Prenom' => 'string',
			'LieuNaissance' => 'string',
			'Sexe' => 'string',
			'CodeDiplome' => 'required',
			'SerieOuFiliereBase' => 'string',
			'Mention' => 'string',
			'CycleSollicite' => 'required',
			'FiliereManuel' => 'required',
			'filiere_id' => 'required',
			'LibelleFiliere' => 'string',
			'StatutAllocataire' => 'string',
			'Contact' => 'string',
			'ContactParent' => 'string',
			'DepotPhysique' => 'required',
			'StatutTraitement' => 'required|string',
			'Observation' => 'string',
        ];
    }
}
