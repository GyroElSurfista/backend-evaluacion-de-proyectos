<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use App\Models\Planificacion;
use App\Utils\FechasUtil;
use Carbon\Carbon;
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
                "max:50",
                Rule::unique('Objetivo')->where(function ($query) {
                    return $query->where('identificadorPlani', $this->identificadorPlani);
                })
            ],
            "fechaInici" => ["date_format:Y-m-d", "required"],
            "fechaFin" => [
                "date_format:Y-m-d",
                "required",
                "after:fechaInici",


            ],
            "valorPorce" => ["numeric", "required", "between:0,100", "regex:/^\d+([\.\,]\d{1,2})?$/"],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $identificadorPlani = $this->input('identificadorPlani');
            $fechaInici = $this->input('fechaInici');
            $fechaFin = $this->input('fechaFin');

            $planificacion = Planificacion::findOrFail($identificadorPlani);

            $diaRevision = FechasUtil::diaANumero($planificacion->diaRevis);
            $fechaFinParsed = Carbon::parse($fechaFin);
            if ($fechaFinParsed->dayOfWeek !== $diaRevision) {
                $validator->errors()->add('fechaFin', 'La fecha de finalización debe coincidir con el día de revisión de la planificación (' . $planificacion->diaRevis . ')');
            }

            if ($planificacion->siguienteFechaIniciDispo === null) {
                $validator->errors()->add('fechaInici', 'La planificación ya no permite agregar más objetivos porque su intervalo de fecha ha sido totalmente cubierto.');
            }

            if (Carbon::parse($fechaInici)->startOfDay()->lt(Carbon::parse($planificacion->siguienteFechaIniciDispo)->startOfDay())) {
                $fechaFormateada = Carbon::parse($planificacion->siguienteFechaIniciDispo)->format('d/m/Y');
                $validator->errors()->add('fechaInici', 'La fecha de inicio debe ser igual o posterior a la siguiente fecha disponible (' . $fechaFormateada . ')');
            }
        });
    }
}
