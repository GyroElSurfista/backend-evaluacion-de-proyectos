<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActividadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:255',
            'fechaInici' => 'required|date|before_or_equal:fechaFin',
            'fechaFin' => 'required|date|after_or_equal:fechaInici',
            'identificadorUsua' => 'required|exists:users,id',
            'identificadorObjet' => 'required|exists:Objetivo,identificador',
            'resultados' => 'required|array',
            'resultados.*' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres.',
            'fechaInici.required' => 'La fecha de inicio es obligatoria.',
            'fechaInici.before_or_equal' => 'La fecha de inicio no puede ser posterior a la fecha de fin.',
            'fechaFin.required' => 'La fecha de fin es obligatoria.',
            'fechaFin.after_or_equal' => 'La fecha de fin no puede ser anterior a la fecha de inicio.',
            'identificadorUsua.required' => 'El responsable es obligatorio.',
            'identificadorUsua.exists' => 'El responsable seleccionado no es válido.',
            'identificadorObjet.required' => 'El objetivo es obligatorio.',
            'identificadorObjet.exists' => 'El objetivo seleccionado no es válido.',
            'resultados.required' => 'Los resultados esperados son obligatorios.',
            'resultados.*.required' => 'Cada resultado esperado es obligatorio.',
            'resultados.*.max' => 'Cada resultado esperado no puede tener más de 255 caracteres.',
        ];
    }
}