<?php

namespace App\Services;

use App\Models\Motivo;

class MotivoService
{

    public function getMotivos()
    {
        return Motivo::all();
    }
}
