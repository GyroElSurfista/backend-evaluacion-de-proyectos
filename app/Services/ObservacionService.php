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

        foreach ($data as $key => $value) {
            if ($key !== 'identificador' && array_key_exists($key, $observacion->getAttributes())) {
                $observacion->$key = $value;
            }
        }
        $observacion->save();

        return $observacion;
    }
}
