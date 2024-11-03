<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchObjetivoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'nullable|string|max:255',
            'planificacion_id' => 'required|exists:Planificacion,identificador',
        ];
    }

    public function messages()
    {
        return [
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'planificacion_id.required' => 'El ID de Planificación es obligatorio.',
            'planificacion_id.exists' => 'El ID de Planificación no es válido.',
        ];
    }
}