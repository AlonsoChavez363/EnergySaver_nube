<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosAdmin extends FormRequest
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
        'nombre' => 'required|min:3|max:255',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required|date',
        'correo' => 'required|email:rfc,dns',
        'password' => 'required|string|min:8|confirmed',
        'Id_genero' => 'required|exists:generos,id',
        'tipo' => 'required|in:user,admin',

        ];
    }
}
