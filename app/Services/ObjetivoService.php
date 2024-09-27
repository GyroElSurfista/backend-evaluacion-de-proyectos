<?php

namespace App\Services;

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
}
