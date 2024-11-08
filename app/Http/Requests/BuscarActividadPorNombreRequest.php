<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarActividadPorNombreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|min:1|max:50',
            'grupoEmpresaId' => 'required|exists:GrupoEmpresa,identificador',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'nombre.string' => 'El nombre de la actividad debe ser una cadena de texto.',
            'nombre.min' => 'El nombre de la actividad debe tener al menos 1 carácter.',
            'nombre.max' => 'El nombre de la actividad no puede tener más de 50 caracteres.',
            'grupoEmpresaId.required' => 'El identificador del grupo empresa es obligatorio.',
            'grupoEmpresaId.exists' => 'El identificador del grupo empresa no es válido.',
        ];
    }
}