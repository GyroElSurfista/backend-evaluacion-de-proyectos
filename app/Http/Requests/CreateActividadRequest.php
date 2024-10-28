<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:50|unique:Actividad,nombre,NULL,id,identificadorObjet,' . $this->identificadorObjet,
            'descripcion' => 'nullable|string|max:255',
            'fechaInici' => 'required|date|before_or_equal:fechaFin|after_or_equal:today',
            'fechaFin' => 'required|date|after_or_equal:fechaInici',
            'identificadorUsua' => 'required|exists:users,id',
            'identificadorObjet' => 'required|exists:Objetivo,identificador',
            'resultados' => 'required|array|min:1',
            'resultados.*' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'nombre.unique' => 'El nombre de la actividad ya existe en el mismo objetivo.',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres.',
            'fechaInici.required' => 'La fecha de inicio es obligatoria.',
            'fechaInici.before_or_equal' => 'La fecha de inicio no puede ser posterior a la fecha de fin.',
            'fechaInici.after_or_equal' => 'La fecha de inicio no puede ser anterior a la fecha actual.',
            'fechaFin.required' => 'La fecha de fin es obligatoria.',
            'fechaFin.after_or_equal' => 'La fecha de fin no puede ser anterior a la fecha de inicio.',
            'identificadorUsua.required' => 'El responsable es obligatorio.',
            'identificadorUsua.exists' => 'El responsable seleccionado no es válido.',
            'identificadorObjet.required' => 'El objetivo es obligatorio.',
            'identificadorObjet.exists' => 'El objetivo seleccionado no es válido.',
            'resultados.required' => 'Los resultados esperados son obligatorios.',
            'resultados.min' => 'Debe haber al menos un resultado esperado.',
            'resultados.*.required' => 'Cada resultado esperado es obligatorio.',
            'resultados.*.max' => 'Cada resultado esperado no puede tener más de 255 caracteres.',
        ];
    }
}