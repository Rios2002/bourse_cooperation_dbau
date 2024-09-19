<?php

namespace App\Http\Requests;

use App\Models\TypeChamp;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class ChampFormulaireRequest extends FormRequest
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
        $rules =  [
            'formulaire_id' => 'required',
            'CodeTypeChamp' => 'required|exists:type_champs,CodeTypeChamp',
            'LibelleChamp' => 'required|string',
            'DescriptionChamp' => 'string',
            'classCSS' => 'nullable|string',
            'isRequired' => 'required',
        ];
        $codeTypeChamp = $this->input('CodeTypeChamp') ?? null;
        $tc = TypeChamp::find($codeTypeChamp);
        if (!is_null($tc)) {
            $compl = $tc->attributTypeChamps()->get();
            foreach ($compl as $comp) {
                $validation_larave = $comp->TypeValeur;
                if ($comp->TypeValeur == 'double') {
                    $validation_larave = 'numeric';
                }
                $rules['attribut_' . $comp->id] = 'nullable|' . $validation_larave;
            }
        }


        return $rules;
    }
}
