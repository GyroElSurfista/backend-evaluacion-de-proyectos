<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ObservacionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'required',
                'string',
                'max:100',
                Rule::unique('Observacion')->where(function ($query) {
                    return $query->where('identificadorPlaniSegui', $this->identificadorPlaniSegui)
                                 ->where('identificadorActiv', $this->identificadorActiv);
                })
            ],
            'fecha' => 'required|date',
            'identificadorPlaniSegui' => 'required|exists:PlanillaSeguimiento,identificador',
            'identificadorActiv' => 'required|exists:Actividad,identificador',
        ];
    }

    
}