<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaUpdateRequest extends FormRequest
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
            'nombre' => 'required|string|min:2',
            'correo' => ['required', 'email'],
            'usuario' => 'required|email|string|min:2',
            'clave' => 'required|string|min:2',
            'client_id' => 'required|string|min:2',
            'client_secret' => 'required|string|min:2',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'correo.required' => 'El campo "Correo electrónico" es obligatorio.',
            'correo.email' => 'El campo "Correo electrónico" debe ser una dirección de correo electrónico válida.',
            'usuario.required' => 'El campo "Cuenta PowerBI Usuario" es obligatorio.',
            'usuario.email' => 'El campo "Cuenta PowerBI Usuario" debe ser una dirección de correo electrónico válida.',
            'clave.required' => 'El campo "Cuenta PowerBI Contraseña" es obligatorio.',
            'clave.min' => 'El campo "Cuenta Power BI Contraseña" debe tener al menos 8 caracteres.',
            'client_id.required' => 'El campo "Cuenta PowerBI Client ID" es obligatorio.',
            'client_secret.required' => 'El campo "Cuenta PowerBI Client Secret" es obligatorio.',
        ];
    }
}
