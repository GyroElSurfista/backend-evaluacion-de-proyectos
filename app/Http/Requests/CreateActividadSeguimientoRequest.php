<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadSeguimientoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|min:1|max:50',
            'observaciones' => 'required|array|min:1',
            'observaciones.*.descripcion' => 'required|string|min:5|max:255',
            'identificadorPlaniSegui' => 'required|exists:PlanillaSeguimiento,identificador',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la actividad de seguimiento es obligatorio.',
            'nombre.string' => 'El nombre de la actividad de seguimiento debe ser una cadena de texto.',
            'nombre.min' => 'El nombre de la actividad de seguimiento debe tener al menos 1 carácter.',
            'nombre.max' => 'El nombre de la actividad de seguimiento no puede tener más de 50 caracteres.',
            'observaciones.required' => 'Debe agregar al menos una observación.',
            'observaciones.array' => 'Las observaciones deben ser un arreglo.',
            'observaciones.*.descripcion.required' => 'La descripción de la observación es obligatoria.',
            'observaciones.*.descripcion.string' => 'La descripción de la observación debe ser una cadena de texto.',
            'observaciones.*.descripcion.min' => 'La descripción de la observación debe tener al menos 5 caracteres.',
            'observaciones.*.descripcion.max' => 'La descripción de la observación no puede tener más de 255 caracteres.',
            'identificadorPlaniSegui.required' => 'El identificador de la planilla de seguimiento es obligatorio.',
            'identificadorPlaniSegui.exists' => 'El identificador de la planilla de seguimiento no es válido.',
        ];
    }
}