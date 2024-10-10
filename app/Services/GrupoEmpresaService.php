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

}