<?php

namespace App\Services;

use App\Models\PlanillaSeguimiento;

class PlanillaSeguimientoService
{
    public function index()
    {
        return PlanillaSeguimiento::all();
    }
}
