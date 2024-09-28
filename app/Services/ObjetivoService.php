<?php

namespace App\Services;

use App\Models\Entregable;
use App\Models\Objetivo;
use App\Models\PlanillaSeguimiento;
use App\Utils\FechasUtil;
use Carbon\Carbon;

class ObjetivoService
{
    public function createObjetivo(array $data)
    {
        return Objetivo::create([
            "identificadorPlani" => $data["identificadorPlani"],
            "nombre" => $data["nombre"],
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "valorPorce" => $data["valorPorce"]
        ]);
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
        return PlanillaSeguimiento::where('identificadorObjet', $identificador)->with('observacion  ')->get();
    }

    public function genPlanillas($identificador)
    {
        $objetivo = Objetivo::where('identificador', $identificador)->firstOrFail();
        $diaRevis = $objetivo->planificacion()->pluck('diaRevis')->first();
        $diaRevis = FechasUtil::diaANumero($diaRevis);
        $fechas = FechasUtil::getFechasDia($objetivo->fechaInici, $objetivo->fechaFin, $diaRevis);

        $planillas = [];

        foreach ($fechas as $fecha) {
            // Verificar si ya existe una planilla para este objetivo en la fecha dada
            $planillaExistente = PlanillaSeguimiento::where('identificadorObjet', $objetivo->identificador)
                ->whereDate('fecha', Carbon::parse($fecha)) // Comparación exacta de fecha
                ->exists();

            // Si no existe, crear una nueva planilla
            if (!$planillaExistente) {
                $planilla = PlanillaSeguimiento::create([
                    'identificadorObjet' => $objetivo->identificador,
                    'fecha' => $fecha,
                ]);

                // Guardar la planilla en el array
                $planillas[] = $planilla;
            }
        }

        return $planillas;
    }
}
