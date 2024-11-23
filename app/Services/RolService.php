<?php

namespace App\Services;

use App\Models\Rol;

class RolService
{
    public function getFunciones($identificador)
    {
        return Rol::with('rolFuncion.funcion')
            ->where('identificador', $identificador)
            ->get()
            ->pluck('rolFuncion')
            ->flatten()
            ->pluck('funcion');
    }
}
