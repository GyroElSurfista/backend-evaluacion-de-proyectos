<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CrearPlanificacionRequest extends FormRequest
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
            "nombre" => [
                "string",
                "required",
                Rule::unique('Planificacion')->where(function ($query) {
                    return $query->where('identificadorGrupoEmpre', $this->identificadorGrupoEmpre);
                })
            ],
            "fechaInici" => ["date_format:Y-m-d", "required"],
            "fechaFin" => ["date_format:Y-m-d", "required", "after:fechaInici"],
            "costo" => ["numeric", "required"],
            "diaRevis" => ["string", "required"],
            "identificadorGrupoEmpre" => ["integer", "required", "exists:GrupoEmpresa,identificador"]
        ];
    }
}