<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CrearObjetivoRequest extends FormRequest
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
            "identificadorPlani" => ["integer", "required", "exists:Planificacion,identificador"],
            "nombre" => [
                "string",
                "required",
                "max:40",
                Rule::unique('Objetivo')->where(function ($query) {
                    return $query->where('identificadorPlani', $this->identificadorPlani);
                })
            ],
            "fechaInici" => ["date_format:Y-m-d", "required"],
            "fechaFin" => ["date_format:Y-m-d", "required", "after:fechaInici"],
            "valorPorce" => ["numeric", "required", "between:0,100", "regex:/^\d+([\.\,]\d{1,2})?$/"],
        ];
    }
}
