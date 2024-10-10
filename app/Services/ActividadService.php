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
}