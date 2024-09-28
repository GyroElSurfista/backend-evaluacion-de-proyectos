<?php

namespace App\Services;

use App\Models\Entregable;
use App\Models\Objetivo;

class ObjetivoService
{
    public function createObjetivo(array $data)
    {
        return Objetivo::create([
            "identificadorPlani" => $data["identificadorPlani"],
            "nombre" => $data["nombre"],
            "fechaInici" => $data["fechaInici"],
            "fechaFin" => $data["fechaFin"],
            "valorPorce" => $data["valorPorce"]
        ]);
    }

    public function getActividades($identificador)
    {
        $objetivo = Objetivo::find($identificador);
        if ($objetivo == null) {
            return [];
        }
        return $objetivo->actividad;
    }

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }

    public function storeEntregable($data)
    {
        return Entregable::create([
            "identificadorObjet" => $data["identificadorObjet"],
            "nombre" => $data["nombre"],
            "descripcion" => $data["descripcion"]
        ]);
    }
}
