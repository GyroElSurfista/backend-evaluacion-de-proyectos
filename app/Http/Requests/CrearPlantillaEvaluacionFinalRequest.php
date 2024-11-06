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
            "nombre" => ["string", "required", "max:50"],
            "descripcion" => ["string", "nullable", "max:256"],
            "puntaje" => ["integer", "required", "min:0"],
            "rubricas" => ["array", "required"],
            "rubricas.*.identificadorCriteEvaluFinal" => ["integer", "required", "exists:CriterioEvaluacionFinal,identificador"],
            "rubricas.*.identificadorParamEvalu" => ["integer", "required", "exists:ParametroEvaluacion,identificador"],
            "rubricas.*.valorMaxim" => ["integer", "required", "min:1"]
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $rubricas = $this->input('rubricas', []);
            $puntaje = $this->input('puntaje');

            // Sumar todos los valores de `valorMaxim` en las rúbricas
            $sumValorMaxim = collect($rubricas)->sum('valorMaxim');

            // Validar si `puntaje` es igual a la suma de `valorMaxim`
            if ($puntaje !== $sumValorMaxim) {
                $validator->errors()->add('puntaje', 'El puntaje debe ser igual a la sumatoria de todos los valores de valorMaxim en las rúbricas (' . $sumValorMaxim . ").");
            }
        });
    }
}
