<?php

namespace App\Services;

use App\Models\CriterioAceptacionEntregable;
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

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }

    public function storeEntregable($data)
    {
        $entregable = Entregable::create([
            "identificadorObjet" => $data["identificadorObjet"],
            "nombre" => $data["nombre"],
            "descripcion" => $data["descripcion"]
        ]);

        $criteriosAcept = [];

        foreach ($data["criteriosAcept"] as $criterio) {
            $criterioBd = CriterioAceptacionEntregable::create([
                "identificadorEntre" => $entregable->identificador,
                "descripcion" => $criterio["descripcion"]
            ]);
            $criteriosAcept[] = $criterioBd;
        }

        $entregable->setAttribute('criteriosAcept', $criteriosAcept);

        return $entregable;
    }
}
