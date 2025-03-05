<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalatStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $salat = $this->route('salat')->id ?? null;
        return [
            'name' => 'required|string|max:50|unique:salats,name,' . $salat,
            'faraj_rakat' => 'required|numeric|min:0',
            'position' => 'required|numeric|min:1'
        ];
    }
}
