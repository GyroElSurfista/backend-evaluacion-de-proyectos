<?php

namespace App\Services;

use App\Models\Asistencia;
use App\Models\AsistenciaMotivo;
use Illuminate\Support\Facades\DB;

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
        return DB::transaction(function () use ($data) {
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
        });
    }

    public function getAsistenciaPorGrupoEmpresaYFecha($grupoEmpresaId, $fecha)
    {
        return DB::table('Asistencia')
            ->join('users', 'Asistencia.identificadorUsuar', '=', 'users.id')
            ->join('GrupoEmpresa', 'users.identificadorGrupoEmpre', '=', 'GrupoEmpresa.identificador')
            ->leftJoin('AsistenciaMotivo', 'Asistencia.identificador', '=', 'AsistenciaMotivo.identificadorAsist')
            ->leftJoin('Motivo', 'AsistenciaMotivo.identificadorMotiv', '=', 'Motivo.identificador')
            ->where('GrupoEmpresa.identificador', $grupoEmpresaId)
            ->where('Asistencia.fecha', $fecha)
            ->select(
                'Asistencia.identificador',
                'users.name as usuario',
                'Asistencia.fecha',
                'Asistencia.valor',
                'Motivo.descripcion as motivo',
                'Asistencia.identificadorUsuar as identificadorUsuar',
                'Motivo.identificador as identificadorMotiv'
            )
            ->get();
    }
}
