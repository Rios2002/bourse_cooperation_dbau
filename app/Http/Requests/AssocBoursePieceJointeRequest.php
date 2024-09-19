<?php

namespace App\Http\Requests;

use App\Models\Bourse;
use App\Models\PieceJointe;
use Illuminate\Foundation\Http\FormRequest;

class AssocBoursePieceJointeRequest extends FormRequest
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
            'piece_jointe_id' => 'required',
            'CodeDiplome' => 'required',
        ];
    }

    /**
     * Get the bourse associated with the AssocBoursePieceJointeRequest
     *

     */
}
