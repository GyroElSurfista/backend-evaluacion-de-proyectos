<?php

namespace App\Services;

use App\Models\Actividad;
use App\Models\Objetivo;
use Illuminate\Support\Facades\DB;
use App\Models\ResultadoEsperado;
use Carbon\Carbon;

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

    private function esEliminable(Actividad $actividad)
    {
        $objetivo = $actividad->objetivo;
        $fechaInicioObjetivo = Carbon::parse($objetivo->fechaInici);
        $fechaFinObjetivo = Carbon::parse($objetivo->fechaFin);
        $now = Carbon::now();

        if ($fechaInicioObjetivo->isPast() || $fechaFinObjetivo->isPast()) {
            return false;
        }

        if ($fechaInicioObjetivo->diffInDays($now) > 5) {
            return false;
        }

        return true;
    }

    public function deleteActividad($identificador)
    {
        $actividad = Actividad::find($identificador);
        if ($actividad == null) {
            return ['error' => 'Actividad no encontrada', 'status' => 404];
        }

        if (!$this->esEliminable($actividad)) {
            return ['error' => 'No se puede eliminar una actividad debido a restricciones de tiempo.', 'status' => 400];
        }

        foreach ($actividad->observacion as $observacion) {
            $observacion->delete();
        }

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
                                ->with('usuario') 
                                ->get();

        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con el nombre especificado', 'status' => 404];
        }

        $actividades = $actividades->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'responsable' => $actividad->usuario->name,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
            ];
        });

        return $actividades;
    }

    public function filtrarActividadesPorObjetivo($objetivoId, $planificacionId)
    {
        $actividades = Actividad::where('identificadorObjet', $objetivoId)
                                ->whereHas('objetivo.planificacion', function ($query) use ($planificacionId) {
                                    $query->where('identificador', $planificacionId);
                                })
                                ->with('usuario') 
                                ->get();

        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades para el objetivo especificado', 'status' => 404];
        }

        $actividades = $actividades->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'responsable' => $actividad->usuario->name,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
            ];
        });

        return $actividades;
    }

    public function buscarActividadPorNombreYObjetivo($nombre, $objetivoId, $planificacionId)
    {
        $actividades = Actividad::where('nombre', 'like', '%' . $nombre . '%')
                                ->where('identificadorObjet', $objetivoId)
                                ->whereHas('objetivo.planificacion', function ($query) use ($planificacionId) {
                                    $query->where('identificador', $planificacionId);
                                })
                                ->with('usuario') // Cargar la relación con el usuario
                                ->get();

        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con el nombre y objetivo especificados', 'status' => 404];
        }

        $actividades = $actividades->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'responsable' => $actividad->usuario->name,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
            ];
        });

        return $actividades;
    }

    public function eliminarActividadesEnConjunto(array $ids)
    {
        $actividades = Actividad::whereIn('identificador', $ids)->get();
        if ($actividades->isEmpty()) {
            return ['error' => 'No se encontraron actividades con los IDs especificados', 'status' => 404];
        }

        $actividadesNoEliminables = [];

        foreach ($actividades as $actividad) {
            if (!$this->esEliminable($actividad)) {
                $actividadesNoEliminables[] = $actividad->identificador;
                continue;
            }

            foreach ($actividad->observacion as $observacion) {
                $observacion->delete();
            }

            foreach ($actividad->resultadoEsperado as $resultado) {
                $resultado->delete();
            }

            $actividad->delete();
        }

        if (!empty($actividadesNoEliminables)) {
            return [
                'error' => 'No se pudieron eliminar algunas actividades debido a restricciones de tiempo.',
                'actividades_no_eliminables' => $actividadesNoEliminables,
                'status' => 400
            ];
        }

        return ['message' => 'Actividades eliminadas correctamente', 'status' => 200];
    }
}