<?php

namespace App\Http\Controllers;

use APP\Services\EvaluacionObjetivoService;
use Illuminate\Http\Request;

class EvaluacionObjetivoController extends Controller
{
    protected EvaluacionObjetivoService $evaluacionObjetivoService;

    public function __construct(EvaluacionObjetivoService $evaluacionObjetivoService)
    {
        $this->evaluacionObjetivoService = $evaluacionObjetivoService;
    }

    public function getInfoEvaluacion($identificador)
    {
        return response()->json($this->evaluacionObjetivoService->getInfoEvaluacion($identificador), 200);
    }
}
