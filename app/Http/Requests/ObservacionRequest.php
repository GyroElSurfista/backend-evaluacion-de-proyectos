<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
            'descripcion' => 'required|string|max:100',
            'fecha' => 'required|date',
            'identificadorPlaniSegui' => 'required|exists:PlanillaSeguimiento,identificador',
            'identificadorActiv' => 'required|exists:Actividad,identificador',
        ];
    }
    
}