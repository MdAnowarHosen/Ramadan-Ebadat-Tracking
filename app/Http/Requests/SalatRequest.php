<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'nullable|date_format:Y-m-d',
            'sunnah_rakat' => 'required|integer|min:0|max:23',
        ];
    }
}
