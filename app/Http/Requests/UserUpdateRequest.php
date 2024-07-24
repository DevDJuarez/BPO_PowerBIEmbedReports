<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('usuario'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo "Nombre" es obligatorio.',
            'name.string' => 'El campo "Nombre" debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'email.required' => 'El campo "Correo electrónico" es obligatorio.',
            'email.email' => 'El campo "Correo electrónico" debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
        ];
    }
}
