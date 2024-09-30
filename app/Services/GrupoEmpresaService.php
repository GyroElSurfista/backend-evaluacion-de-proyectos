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

}