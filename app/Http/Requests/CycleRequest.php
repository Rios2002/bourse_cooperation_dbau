<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CycleRequest extends FormRequest
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
        $CodeCycle = $this->route('cycle') ? $this->route('cycle')->CodeCycle : null;
        return [
            'CodeCycle' => 'required|string|max:50|unique:cycles,CodeCycle,' . $CodeCycle . ',CodeCycle',
            'LibelleCycle' => 'required|string|max:255|unique:cycles,LibelleCycle,' . $CodeCycle . ',CodeCycle',
            'isWritable' => 'nullable|boolean|in:0',
        ];
    }
}
