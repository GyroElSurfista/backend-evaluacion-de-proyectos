<?php

namespace App\Services;

use App\Models\CriterioEvaluacionFinal;

class CriterioEvaluacionFinalService
{

    public function index()
    {
        return CriterioEvaluacionFinal::all();
    }
}
