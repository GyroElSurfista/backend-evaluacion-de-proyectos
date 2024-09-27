<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            "nombre" => ["string", "required", "max:40"],
            "fechaInici" => ["date_format:d-m-Y", "required"],
            "fechaFin" => ["date_format:d-m-Y", "required", "after:fechaInici"],
            "valorPorce" => ["numeric", "required", "between:0,100", "regex:/^\d+([\.\,]\d{1,2})?$/"],
        ];
    }
}
