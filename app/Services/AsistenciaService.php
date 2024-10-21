<?php

namespace App\Services;

use App\Models\Asistencia;
use App\Models\AsistenciaMotivo;

class AsistenciaService
{

    public function registrarAsistencia($data)
    {
        return Asistencia::create([
            'identificadorUsuar' => $data['identificadorUsuar'],
            'fecha' => $data['fecha'],
            'valor' => $data['valor']
        ]);
    }

    public function registrarInasistencia($data)
    {
        $asistencia = Asistencia::create([
            'identificadorUsuar' => $data['identificadorUsuar'],
            'fecha' => $data['fecha'],
            'valor' => $data['valor']
        ]);

        AsistenciaMotivo::create([
            'identificadorAsist' => $asistencia->identificador,
            'identificadorMotiv' => $data['identificadorMotiv']
        ]);

        $asistencia->load('motivoAsistencias.motivo');

        return $asistencia;
    }
}
