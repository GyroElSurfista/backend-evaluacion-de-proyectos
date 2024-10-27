<?php

namespace App\Services;

use App\Models\Planificacion;
use Carbon\Carbon;

class PlanificacionService
{

    public function createPlanificacion(array $data)
    {
        return Planificacion::create([
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "costo" => $data["costo"],
            "identificadorGrupoEmpre" => $data["identificadorGrupoEmpre"]
        ]);
    }

    public function getPlanificacions($identificador)
    {
        $planificacion = Planificacion::with('planificacion')->find($identificador);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->planificacion;
    }

    public function getPlanificacionsConActividades($id)
    {
        $planificacion = Planificacion::with('planificacion.actividad')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->planificacion;
    }

    public function getActividadesConResultados($id)
    {
        $planificacion = Planificacion::with('planificacion.actividad.resultadoEsperado')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $actividades = $planificacion->planificacion->flatMap->actividad->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
                'responsable' => $actividad->usuario->name,
                'planificacion' => $actividad->planificacion->nombre,
                'resultados' => $actividad->resultadoEsperado->pluck('descripcion')->toArray(),
            ];
        });

        return $actividades;
    }

    public function getObservacionesDePlanificacion($id)
    {
        $planificacion = Planificacion::with('planificacion.planillaseguimiento.observacion')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $observaciones = $planificacion->planificacion->flatMap->planillaSeguimiento->flatMap->observacion->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad->nombre,
                'fechaPlaniSegui' => $observacion->planillaSeguimiento->fecha,
                'identificadorActiv' => $observacion->identificadorActiv,
                'identificadorPlaniSegui' => $observacion->identificadorPlaniSegui,
            ];
        });

        return $observaciones;
    }

    public function getObservacionesDePlanificacion1($id)
    {
        $planificacion = Planificacion::with('planificacion.actividad.observacion')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $observaciones = $planificacion->planificacion->flatMap->actividad->flatMap->observacion->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad->nombre,
                'identificadorActiv' => $observacion->identificadorActiv,
                'identficadorPlaniSegui' => $observacion->identificadorPlaniSegui,
            ];
        });

        return $observaciones;
    }

    public function planificacionDesarrolloNoIniciado($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->lessThan($planificacion->fechaInici);
    }
    public function planificacionEnDesarrollo($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->between($planificacion->fechaInici, $planificacion->fechaFin);
    }
    public function planificacionDesarrolloFinalizado($identificador)
    {
        $planificacion = Planificacion::where('identificador', $identificador)->firstOrFail();
        return Carbon::now()->greaterThan($planificacion->fechaFin);
    }
}
