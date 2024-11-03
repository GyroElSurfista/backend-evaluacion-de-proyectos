<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPlantillaEvaluacionFinalRequest extends FormRequest
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
            "nombre" => ["string", "required", "max:50", "unique:PlantillaEvaluacionFinal,nombre"],
            "descripcion" => ["string", "nullable", "max:50"],
            "rubricas" => ["array", "required"],
            "rubricas.*.identificadorCriteEvaluFinal" => ["integer", "required", "exists:CriterioEvaluacionFinal,identificador"],
            "rubricas.*.identificadorParamEvalu" => ["integer", "required", "exists:ParametroEvaluacion,identificador"],
            "rubricas.*.valorMaxim" => ["integer", "required", "min:1"]
        ];
    }
}
