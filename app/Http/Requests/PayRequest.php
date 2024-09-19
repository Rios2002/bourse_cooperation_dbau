<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
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
        $CodePays = $this->route('pays') ? $this->route('pays')->CodePays : null;
        return [
            'CodePays' => 'required|string|max:3|unique:pays,CodePays,' . $CodePays . ',CodePays',
            'LibellePays' => 'required|string|max:255|unique:pays,LibellePays,' . $CodePays . ',CodePays',
            'Nationalite' => 'required|string|max:255',
        ];
    }
}
