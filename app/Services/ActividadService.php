<?php

namespace App\Services;

use App\Models\Actividad;
use App\Models\Objetivo;
use Illuminate\Support\Facades\DB;
use App\Models\ResultadoEsperado;

class ActividadService
{
    public function getAllActividades()
    {
        return Actividad::all();
    }

    public function getObservaciones($identificador)
    {
        $actividad = Actividad::find($identificador);
        if ($actividad == null) {
            return ['error' => 'Actividad no encontrada', 'status' => 404];
        }
        return $actividad->observacion;
    }

    public function createActividad($data)
    {
        $objetivo = Objetivo::find($data['identificadorObjet']);
        if ($objetivo == null) {
            return ['error' => 'Objetivo no encontrado', 'status' => 404];
        }

        return Actividad::create($data);
    }

    public function deleteActividad($identificador)
    {
        $actividad = Actividad::find($identificador);
        if ($actividad == null) {
            return ['error' => 'Actividad no encontrada', 'status' => 404];
        }

        // Eliminar observaciones asociadas
        foreach ($actividad->observacion as $observacion) {
            $observacion->delete();
        }

        // Eliminar resultados esperados asociados
        foreach ($actividad->resultadoEsperado as $resultado) {
            $resultado->delete();
        }

        $actividad->delete();
        return ['message' => 'Actividad eliminada exitosamente', 'status' => 200];
    }

    public function crearActividad(array $data)
    {
        DB::transaction(function () use ($data) {
            $actividad = Actividad::create([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'fechaInici' => $data['fechaInici'],
                'fechaFin' => $data['fechaFin'],
                'identificadorUsua' => $data['identificadorUsua'],
                'identificadorObjet' => $data['identificadorObjet'],
            ]);

            foreach ($data['resultados'] as $resultado) {
                ResultadoEsperado::create([
                    'descripcion' => $resultado,
                    'identificadorActiv' => $actividad->identificador,
                ]);
            }
        });
    }

    public function buscarActividadPorNombre($nombre, $planificacionId)
    {
        $actividades = Actividad::where('nombre', 'like', '%' . $nombre . '%')
                                ->whereHas('objetivo.planificacion', function ($query) use ($planificacionId) {
                                    $query->where('identificador', $planificacionId);
                                })
                                ->get();
        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con el nombre especificado', 'status' => 404];
        }

        return $actividades;
    }

    public function filtrarActividadesPorObjetivo($objetivoId, $planificacionId)
    {
        $actividades = Actividad::where('identificadorObjet', $objetivoId)
                                ->whereHas('objetivo.planificacion', function ($query) use ($planificacionId) {
                                    $query->where('identificador', $planificacionId);
                                })
                                ->get();
        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades para el objetivo especificado', 'status' => 404];
        }

        return $actividades;
    }

    public function buscarActividadPorNombreYObjetivo($nombre, $objetivoId, $planificacionId)
    {
        $actividades = Actividad::where('nombre', 'like', '%' . $nombre . '%')
                                ->where('identificadorObjet', $objetivoId)
                                ->whereHas('objetivo.planificacion', function ($query) use ($planificacionId) {
                                    $query->where('identificador', $planificacionId);
                                })
                                ->get();
        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con el nombre y objetivo especificados', 'status' => 404];
        }

        return $actividades;
    }

    public function eliminarActividadesEnConjunto(array $ids)
    {
        $actividades = Actividad::whereIn('identificador', $ids)->get();
        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con los IDs especificados', 'status' => 404];
        }

        foreach ($actividades as $actividad) {
            $actividad->resultadoEsperado()->delete(); // Eliminar resultados esperados asociados
            $actividad->delete();
        }

        return ['message' => 'Actividades eliminadas correctamente', 'status' => 200];
    }
}