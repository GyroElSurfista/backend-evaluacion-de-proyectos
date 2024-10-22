<?php

namespace App\Services;

use App\Models\GrupoEmpresa;

class GrupoEmpresaService
{
    public function getAllGrupoEmpresas()
    {
        return GrupoEmpresa::all();
    }

    public function getUsuarios($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::find($identificador);
        if ($grupoEmpresa == null) {
            return ['error' => 'Grupo empresa no encontrado', 'status' => 404];
        }
        return $grupoEmpresa->usuarios;
    }

    public function getObjetivosConActividades($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::with('planificacion.objetivo.actividad')->find($identificador);
        if ($grupoEmpresa == null) {
            return ['error' => 'Grupo empresa no encontrado', 'status' => 404];
        }
        return $grupoEmpresa->planificacion->flatMap->objetivo;
    }

    public function getPlanificaciones($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::with('planificacion')->find($identificador);
        if ($grupoEmpresa == null) {
            return ['error' => 'Grupo empresa no encontrado', 'status' => 404];
        }
        return $grupoEmpresa->planificacion;
    }

    public function getObjetivos($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::with('planificacion.objetivo')->find($identificador);
        if ($grupoEmpresa == null) {
            return ['error' => 'Grupo empresa no encontrado', 'status' => 404];
        }

        $objetivos = $grupoEmpresa->planificacion->flatMap(function ($planificacion) {
            return $planificacion->objetivo;
        });

        return $objetivos;
    }

    public function getAsistenciaUsuarios($data)
    {
        $fecha = $data['fecha'];
        $identificador = $data['identificadorGrupoEmpre'];

        $grupoEmpresa = GrupoEmpresa::with('usuarios')->where('identificador', $identificador)->first();

        $resultado = [];

        foreach ($grupoEmpresa->usuarios as $user) {

            $asistencia = $user->asistencia()->where('fecha', $fecha)->first();

            if (!$asistencia) {
                $resultado[] = [
                    'identificadorUsuar' => $user->id,
                    'fecha' => $fecha,
                    'valor' => true,
                    'identificador' => null,
                    'descripcionMotiv' => null
                ];
            } else {

                $motivosAsistencia = $asistencia->motivoAsistencias ?? null;

                if ($motivosAsistencia != null && $motivosAsistencia->isNotEmpty()) {
                    foreach ($motivosAsistencia as $motivoAsistencia) {
                        $motivo = $motivoAsistencia->motivo;

                        $resultado[] = [
                            'identificadorUsuar' => $user->id,
                            'fecha' => $asistencia->fecha,
                            'valor' => $asistencia->valor,
                            'identificador' => $asistencia->identificador,
                            'descripcionMotiv' => $motivo->descripcion ?? null  // Aseguramos que "motivo" tenga una descripción
                        ];
                    }
                } else {
                    // Si no hay motivos, agregar asistencia sin motivo
                    $resultado[] = [
                        'identificadorUsuar' => $user->id,
                        'fecha' => $asistencia->fecha,
                        'valor' => $asistencia->valor,
                        'identificador' => $asistencia->identificador,
                        'descripcionMotiv' => null
                    ];
                }
            }
        }
        return $resultado;
    }
}
