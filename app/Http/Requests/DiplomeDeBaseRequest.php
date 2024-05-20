<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiplomeDeBaseRequest extends FormRequest
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
        $CodeDiplome = $this->route('diplome_de_base') ? $this->route('diplome_de_base')->CodeDiplome : null;

        return [
            'CodeDiplome' => 'required|string|max:50|unique:diplome_de_bases,CodeDiplome,' . $CodeDiplome . ',CodeDiplome',
            'LibelleDiplome' => 'required|string|max:255|unique:diplome_de_bases,LibelleDiplome,' . $CodeDiplome . ',CodeDiplome',
            'CycleCible' => 'required|string|max:50|exists:cycles,CodeCycle',
        ];
    }
}
