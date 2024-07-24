<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaUsuarioStoreRequest extends FormRequest
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
            'empresa_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'empresa_id.required' => 'El campo "Empresa" es obligatorio.',
            'name.required' => 'El campo "Nombre" es obligatorio.',
            'email.required' => 'El campo "Correo electrónico" es obligatorio.',
            'email.email' => 'El campo "Correo electrónico" debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'El campo "Contraseña" es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];
    }
}
