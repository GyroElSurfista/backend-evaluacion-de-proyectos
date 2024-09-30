<?php

namespace App\Services;

use App\Models\Planificacion;

class PlanificacionService
{

    public function createPlanificacion(array $data)
    {
        Planificacion::create([
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "costo" => $data["costo"],
            "identificadorGrupoEmpre" => $data["identificadorGrupoEmpre"]
        ]);
    }
}
