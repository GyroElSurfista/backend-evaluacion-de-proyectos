<?php

namespace APP\Services;

use App\Models\EvaluacionObjetivo;

class EvaluacionObjetivoService
{

    public function index()
    {
        return EvaluacionObjetivo::all();
    }

    public function getInfoEvaluacion($identificador)
    {
        $evaluacion = EvaluacionObjetivo::with('objetivo.entregable')
            ->where('identificador', $identificador)
            ->firstOrFail();

        $entregables = $evaluacion->objetivo->entregable;

        unset($evaluacion->objetivo);

        $evaluacion->entregables = $entregables;

        return $evaluacion;
    }
}
