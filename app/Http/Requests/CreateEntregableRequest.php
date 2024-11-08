<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntregableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|min:5|max:50|regex:/^\S.*\S$/',
            'descripcion' => 'nullable|string|max:256|regex:/^\S.*\S$/',
            'criterios' => 'required|array|min:1',
            'criterios.*.descripcion' => 'required|string|min:5|max:256|regex:/^\S.*\S$/',
            'identificadorObjet' => 'required|exists:Objetivo,identificador',
            'identificadorPlaniSegui' => 'required|exists:PlanillaSeguimiento,identificador',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del entregable es obligatorio.',
            'nombre.string' => 'El nombre del entregable debe ser una cadena de texto.',
            'nombre.min' => 'El nombre del entregable debe tener al menos 5 caracteres.',
            'nombre.max' => 'El nombre del entregable no puede tener más de 50 caracteres.',
            'nombre.regex' => 'El nombre del entregable no debe tener espacios vacíos al principio ni al final.',
            'descripcion.string' => 'La descripción del entregable debe ser una cadena de texto.',
            'descripcion.max' => 'La descripción del entregable no puede tener más de 256 caracteres.',
            'descripcion.regex' => 'La descripción del entregable no debe tener espacios vacíos al principio ni al final.',
            'criterios.required' => 'Debe agregar al menos un criterio de aceptación.',
            'criterios.array' => 'Los criterios de aceptación deben ser un arreglo.',
            'criterios.*.descripcion.required' => 'La descripción del criterio de aceptación es obligatoria.',
            'criterios.*.descripcion.string' => 'La descripción del criterio de aceptación debe ser una cadena de texto.',
            'criterios.*.descripcion.min' => 'La descripción del criterio de aceptación debe tener al menos 5 caracteres.',
            'criterios.*.descripcion.max' => 'La descripción del criterio de aceptación no puede tener más de 256 caracteres.',
            'criterios.*.descripcion.regex' => 'La descripción del criterio de aceptación no debe tener espacios vacíos al principio ni al final.',
            'identificadorObjet.required' => 'El identificador del objetivo es obligatorio.',
            'identificadorObjet.exists' => 'El identificador del objetivo no es válido.',
            'identificadorPlaniSegui.required' => 'El identificador de la planilla de seguimiento es obligatorio.',
            'identificadorPlaniSegui.exists' => 'El identificador de la planilla de seguimiento no es válido.',
        ];
    }
}