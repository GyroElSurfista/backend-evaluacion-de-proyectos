<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchObservacionRequest extends FormRequest
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
            'identificador' => ['integer', 'required'],
            'descripcion' => ['string', 'nullable', 'max:100'],
            'identificadorPlaniSegui' => ['integer', 'required', 'exists:PlanillaSeguimiento,identificador'],
            'identificadorActiv' => ['integer', 'required', 'exists:Actividad,identificador'],
        ];
    }
}
