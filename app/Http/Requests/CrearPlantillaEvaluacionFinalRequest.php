<?php

namespace App\Http\Requests;

use App\Models\ParametroEvaluacion;
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
            "rubricas.*.valorMaxim" => ["integer", "min:1"]
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
            $sumValorMaxim = 0;

            foreach ($rubricas as $index => $rubrica) {
                $parametro = ParametroEvaluacion::with(['paramEvaluCuali', 'paramEvaluCuant'])->where('identificador', $rubrica['identificadorParamEvalu'])->firstOrFail();

                $valorMaxim = $rubrica['valorMaxim'] ?? null;
                if ($valorMaxim !== null) {
                    if (!$parametro->paramEvaluCuali()->exists() && $parametro->paramEvaluCuant()->exists()) {
                        $validator->errors()->add("rubricas.$index.valorMaxim", 'El campo valorMaxim no es necesario para parámetros de evaluación cuantitativos.');
                    } else {
                        $sumValorMaxim += $rubrica['valorMaxim'];
                    }
                } else {
                    if (!$parametro->paramEvaluCuant()->exists() && $parametro->paramEvaluCuali()->exists()) {
                        $validator->errors()->add("rubricas.$index.valorMaxim", 'El campo valorMaxim es obligatorio para parámetros de evaluación cualitativos.');
                    } else {
                        $sumValorMaxim += $parametro->paramEvaluCuant()->first()->valorMaxim;
                    }
                }
            }

            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            if ($puntaje !== $sumValorMaxim) {
                $validator->errors()->add('puntaje', 'El puntaje debe ser igual a la sumatoria de todos los valores de valorMaxim en las rúbricas (' . $sumValorMaxim . ").");
            }
        });
    }
}
