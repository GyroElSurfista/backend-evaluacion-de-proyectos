<?php

namespace APP\Services;

use App\Models\EvaluacionObjetivo;

class EvaluacionObjetivoService
{

    public function index()
    {
        EvaluacionObjetivo::all();
    }
}
