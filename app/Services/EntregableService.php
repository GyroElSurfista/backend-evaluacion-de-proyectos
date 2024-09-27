<?php

namespace App\Services;

use App\Models\Entregable;

class EntregableService
{

    public function getAllEntregable()
    {
        return Entregable::all();
    }

    public function getEntregablesObjet(int $identificadorObjet)
    {
        return Entregable::where('identificadorObjet', $identificadorObjet)->get();
    }
}
