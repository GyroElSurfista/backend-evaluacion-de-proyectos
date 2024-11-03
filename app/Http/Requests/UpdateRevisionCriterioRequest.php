<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRevisionCriterioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'revision_criterio_ids' => 'required|array',
            'revision_criterio_ids.*' => 'required|exists:CriterioAceptacionEntregable,identificador',
            'estado' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'revision_criterio_ids.required' => 'Los IDs de los criterios de revisión son obligatorios.',
            'revision_criterio_ids.array' => 'Los IDs de los criterios de revisión deben ser un arreglo.',
            'revision_criterio_ids.*.exists' => 'Uno o más IDs de los criterios de revisión no son válidos.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}