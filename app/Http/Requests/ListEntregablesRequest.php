<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListEntregablesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha' => 'required|date',
            'identificadorObjet' => 'required|exists:Objetivo,identificador',
        ];
    }

    public function messages()
    {
        return [
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'identificadorObjet.required' => 'El identificador del objetivo es obligatorio.',
            'identificadorObjet.exists' => 'El identificador del objetivo no es válido.',
        ];
    }
}