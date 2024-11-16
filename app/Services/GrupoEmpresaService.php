<?php

namespace App\Services;

use App\Models\GrupoEmpresa;
use App\Models\Planificacion;
use Carbon\Carbon;

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

    public function getPlanificacionesParaActividades($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::with(['planificacion' => function ($query) {
            $query->where('fechaFin', '>=', Carbon::now());
        }])->find($identificador);

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
            $faltas = $user->asistencia()->where('fecha', '<=', $fecha)->where('valor', false)->count();

            if (!$asistencia) {
                $resultado[] = [
                    'identificadorUsuar' => $user->id,
                    'fecha' => $fecha,
                    'valor' => true,
                    'faltas' => $faltas,
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
                            'faltas' => $faltas,
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
                        'faltas' => $faltas,
                        'identificador' => $asistencia->identificador,
                        'descripcionMotiv' => null
                    ];
                }
            }
        }
        return $resultado;
    }

    private function esEliminable($actividad)
    {
        $objetivo = $actividad->objetivo;
        $fechaFinObjetivo = Carbon::parse($objetivo->fechaFin);
        $now = Carbon::now();

        if ($fechaFinObjetivo->isPast()) {
            return false;
        }

        if ($fechaFinObjetivo->diffInDays($now) < 5) {
            return false;
        }

        return true;
    }

    public function getActividadesConResultados($id)
    {
        $grupoEmpresa = GrupoEmpresa::with('planificacion.objetivo.actividad.resultadoEsperado')->find($id);
        if ($grupoEmpresa == null) {
            return ['error' => 'Grupo Empresa no encontrado', 'status' => 404];
        }

        $actividades = $grupoEmpresa->planificacion->flatMap->objetivo->flatMap->actividad->map(function ($actividad) {
            return [
                'identificador' => $actividad->identificador,
                'nombre' => $actividad->nombre,
                'descripcion' => $actividad->descripcion,
                'fechaInici' => $actividad->fechaInici,
                'fechaFin' => $actividad->fechaFin,
                'identificadorUsua' => $actividad->identificadorUsua,
                'identificadorObjet' => $actividad->identificadorObjet,
                'responsable' => $actividad->usuario->name,
                'objetivo' => $actividad->objetivo->nombre,
                'esEliminable' => $this->esEliminable($actividad),
                'proyecto' => $actividad->objetivo->planificacion->nombre,
                'resultados' => $actividad->resultadoEsperado->pluck('descripcion')->toArray(),
            ];
        });

        return $actividades;
    }
}
