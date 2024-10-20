<?php

namespace App\Http\Controllers;

use App\Services\EvaluacionObjetivoService;
use Illuminate\Http\Request;

class EvaluacionObjetivoController extends Controller
{
    protected $evaluacionObjetivoService;

    public function __construct(EvaluacionObjetivoService $evaluacionObjetivoService)
    {
        $this->evaluacionObjetivoService = $evaluacionObjetivoService;
    }

    public function getInfoEvaluacion($identificador)
    {
        return response()->json($this->evaluacionObjetivoService->getInfoEvaluacion($identificador), 200);
    }
}
