<?php

namespace App\Services;

use App\Models\Observacion;
use App\Models\Actividad;

class ObservacionService
{
    public function getAllObservaciones()
    {
        return Observacion::all();
    }

    public function createObservacion($data)
    {
        $actividad = Actividad::find($data['identificadorActiv']);
        if ($actividad == null) {
            return ['error' => 'Actividad no encontrada', 'status' => 404];
        }

        return Observacion::create($data);
    }

    public function deleteObservacion($identificador)
    {
        $observacion = Observacion::find($identificador);
        if ($observacion == null) {
            return ['error' => 'Observacion no encontrada', 'status' => 404];
        }

        $observacion->delete();
        return ['message' => 'Observacion eliminada', 'status' => 200];
    }

    public function update(array $data)
    {
        $observacion = Observacion::findOrFail($data['identificador']);

        $observacion->descripcion = $data['descripcion'] ?? $observacion->descripcion;
        $observacion->identificadorPlaniSegui = $data['identificadorPlaniSegui'] ?? $observacion->identificadorPlaniSegui;
        $observacion->identificadorActiv = $data['identificadorActiv'] ?? $observacion->identificadorActiv;

        $observacion->save();

        return $observacion;
    }

    public function getObservacionesPorObjetivoYPlanificacion($objetivoId, $planificacionId)
    {
        $observaciones = Observacion::whereHas('planillaSeguimiento.objetivo', function ($query) use ($objetivoId, $planificacionId) {
            $query->where('identificador', $objetivoId)
                  ->where('identificadorPlani', $planificacionId);
        })->orWhereHas('actividad.objetivo', function ($query) use ($objetivoId, $planificacionId) {
            $query->where('identificador', $objetivoId)
                  ->where('identificadorPlani', $planificacionId);
        })->get();

        return $observaciones->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad ? $observacion->actividad->nombre : null,
                'fechaPlaniSegui' => $observacion->planillaSeguimiento ? $observacion->planillaSeguimiento->fecha : null,
                'planillaSeguimiento' => $observacion->planillaSeguimiento ? $observacion->planillaSeguimiento->identificador : null,
            ];
        });
    }

    public function getObservacionesPorFiltros($objetivoId, $planillaSeguimientoId, $planificacionId)
    {
        $observaciones = Observacion::whereHas('planillaSeguimiento.objetivo', function ($query) use ($objetivoId, $planificacionId) {
            $query->where('identificador', $objetivoId)
                  ->where('identificadorPlani', $planificacionId);
        })->where('identificadorPlaniSegui', $planillaSeguimientoId)
          ->get();

        return $observaciones->map(function ($observacion) {
            return [
                'identificador' => $observacion->identificador,
                'descripcion' => $observacion->descripcion,
                'fecha' => $observacion->fecha,
                'actividad' => $observacion->actividad ? $observacion->actividad->nombre : null,
                'fechaPlaniSegui' => $observacion->planillaSeguimiento ? $observacion->planillaSeguimiento->fecha : null,
                'identificadorPlaniSegui' => $observacion->planillaSeguimiento ? $observacion->planillaSeguimiento->identificador : null,
                'identificadorActiv' => $observacion->identificadorActiv,
            ];
        });
    }

    public function deleteObservacionesEnConjunto(array $ids)
    {
        $observaciones = Observacion::whereIn('identificador', $ids)->get();
        if ($observaciones->isEmpty()) {
            return ['error' => 'No se encontraron observaciones con los IDs especificados', 'status' => 404];
        }

        Observacion::destroy($ids);
        return ['message' => 'Observaciones eliminadas correctamente', 'status' => 200];
    }
    
}
