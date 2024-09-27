<?php

namespace App\Services;

use App\Models\Observacion;

class ObservacionService
{

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
