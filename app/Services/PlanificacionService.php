<?php

namespace App\Services;

use App\Models\Planificacion;

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

    public function getObjetivos($identificador)
    {
        $planificacion = Planificacion::with('objetivo')->find($identificador);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->objetivo;
    }

    public function getObjetivosConActividades($id)
    {
        $planificacion = Planificacion::with('objetivo.actividad')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }
        return $planificacion->objetivo;
    }

    public function getActividadesConResultados($id)
    {
        $planificacion = Planificacion::with('objetivo.actividad.resultadoEsperado')->find($id);
        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $actividades = $planificacion->objetivo->flatMap->actividad->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
                'responsable' => $actividad->usuario->name,
                'objetivo' => $actividad->objetivo->nombre,
                'resultados' => $actividad->resultadoEsperado->pluck('descripcion')->toArray(),
            ];
        });

        return $actividades;
    }

    public function getObservacionesDePlanificacion($id)
    {
        $planificacion = Planificacion::with([
            'objetivo.planillaSeguimiento.observacion'
        ])->find($id);

        if ($planificacion == null) {
            return ['error' => 'Planificación no encontrada', 'status' => 404];
        }

        $observaciones = collect();

        foreach ($planificacion->objetivo as $objetivo) {
            foreach ($objetivo->planillaSeguimiento as $planillaSeguimiento) {
                if ($planillaSeguimiento->observacion) {
                    $observaciones = $observaciones->merge($planillaSeguimiento->observacion);
                }
            }
        }

        return $observaciones->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'identificadorPlaniSegui' => $observacion->identificadorPlaniSegui,
                'identificadorActiv' => $observacion->identificadorActiv,
            ];
        });
    }
}
