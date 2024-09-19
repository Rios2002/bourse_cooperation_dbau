<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeChampRequest extends FormRequest
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
			'CodeTypeChamp' => 'required|string',
			'LibelleTypeChamp' => 'required|string',
			'SpatieFunction' => 'required|string',
			'ClassCSS' => 'required|string',
			'SpatieAttributes' => 'string',
			'CodeTypeSortie' => 'required',
        ];
    }
}
