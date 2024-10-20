<?php

namespace App\Services;

use App\Models\Entregable;
use App\Models\EvaluacionObjetivo;
use App\Models\Objetivo;
use App\Models\PlanillaSeguimiento;
use App\Utils\FechasUtil;
use Carbon\Carbon;

class ObjetivoService
{
    public function createObjetivo(array $data)
    {
        $objetivo = Objetivo::create([
            "identificadorPlani" => $data["identificadorPlani"],
            "nombre" => $data["nombre"],
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "valorPorce" => $data["valorPorce"]
        ]);

        $nombrePlani = $objetivo->planificacion->nombre;
        $objetivo->nombrePlani = $nombrePlani;

        return $objetivo;
    }

    public function getActividades($identificador)
    {
        $objetivo = Objetivo::find($identificador);
        if ($objetivo == null) {
            return [];
        }
        return $objetivo->actividad;
    }

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }

    public function storeEntregable($data)
    {
        return Entregable::create([
            "identificadorObjet" => $data["identificadorObjet"],
            "nombre" => $data["nombre"],
            "descripcion" => $data["descripcion"]
        ]);
    }

    public function getPlanillas($identificador)
    {
        return PlanillaSeguimiento::where('identificadorObjet', $identificador)->with('observacion')->get();
    }

    public function genPlanillas($identificador)
    {
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();
        $diaRevis = $objetivo->planificacion()->pluck('diaRevis')->first();
        $diaRevis = FechasUtil::diaANumero($diaRevis);
        $fechas = FechasUtil::getFechasDia($objetivo->fechaInici, $objetivo->fechaFin, $diaRevis);

        $planillas = [];

        foreach ($fechas as $fecha) {
            $planillaExistente = PlanillaSeguimiento::where('identificadorObjet', $objetivo->identificador)
                ->whereDate('fecha', Carbon::parse($fecha)) // Comparación exacta de fecha
                ->exists();

            if (!$planillaExistente) {
                $planilla = PlanillaSeguimiento::create([
                    'identificadorObjet' => $objetivo->identificador,
                    'fecha' => $fecha,
                ]);

                $planillas[] = $planilla;
            }
        }

        if (!empty($planillas)) {
            $objetivo->planillasGener = true;
            $objetivo->save();
        }

        return $planillas;
    }

    public function tienePlanillas($identificador)
    {

        $planillas = PlanillaSeguimiento::where('identificadorObjet', $identificador)->get();

        if ($planillas->empty()) {
            return false;
        } else {
            return true;
        }
    }

    public function genPlanillaEvalu($identificador)
    {
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();

        if (!$objetivo->planillaEvaluGener) {
            $evaluacion = EvaluacionObjetivo::create([
                'identificadorObjet' => $objetivo->identificador,
                'fecha' => $objetivo->fechaFin
            ]);

            if ($evaluacion) {
                $objetivo->planillaEvaluGener = true;
                $objetivo->save();
            }
        } else {
            $evaluacion = null;
        }

        return $evaluacion;
    }

    public function getObjetivoConPlanillas($identificador)
    {
        $objetivo = Objetivo::with('planillaSeguimiento')->where('identificador', $identificador)->firstOrFail();

        return $objetivo;
    }

    public function getObjetivosSinPlanillaEvalGener()
    {
        return Objetivo::where('planillaEvaluGener', false)->get();
    }

    public function getObjetivosConPlanillaEvalGener()
    {
        return Objetivo::with('evaluacionObjetivo')->where('planillaEvaluGener', true)->get();
    }
}
