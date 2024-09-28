<?php

namespace App\Services;

use App\Models\Actividad;
use App\Models\Objetivo;

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
}