<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearObjetivoRequest;
use App\Http\Requests\StoreEntregableRequest;
use App\Services\ObjetivoService;
use App\Models\Objetivo;
use Exception;

class ObjetivoController extends Controller
{
    protected $objetivoService;

    public function  __construct(ObjetivoService $objetivoService)
    {
        $this->objetivoService = $objetivoService;
    }

    public function index()
    {
        $objetivos = Objetivo::with('planificacion')->get();

        $objetivosConPlani = $objetivos->map(function ($objetivo) {
            return [
                'identificador' => $objetivo->identificador,
                'nombre' => $objetivo->nombre,
                'fechaInici' => $objetivo->fechaInici,
                'fechaFin' => $objetivo->fechaFin,
                'valorPorce' => $objetivo->valorPorce,
                'planillasGener' => $objetivo->planillasGener,
                'planillaEvaluGener' => $objetivo->planillaEvaluGener,
                'identificadorPlani' => $objetivo->identificadorPlani,
                'nombrePlani' => $objetivo->planificacion ? $objetivo->planificacion->nombre : null,
            ];
        });

        return response()->json($objetivosConPlani, 200);
    }

    public function createObjetivo(CrearObjetivoRequest $request)
    {

        $data = $request->validated();
        $objetivo = $this->objetivoService->createObjetivo($data);

        return response()->json([
            'message' => 'Objetivo creado exitosamente',
            'objetivo' => $objetivo
        ], 201);
    }

    //funcion para obtener todas las actividades de un objetivo
    public function getActividades($identificador)
    {
        return response()->json($this->objetivoService->getActividades($identificador), 200);
    }

    public function getEntregables($identificador)
    {
        return response()->json($this->objetivoService->getEntregablesObjet($identificador), 200);
    }

    public function storeEntregable(StoreEntregableRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->objetivoService->storeEntregable($data), 201);
    }

    public function getPlanillas($identificador)
    {
        return response()->json($this->objetivoService->getPlanillas($identificador), 200);
    }

    public function genPlanillas($identificador)
    {
        return response()->json($this->objetivoService->genPlanillas($identificador), 200);
    }

    public function genPlanillaEvalu($identificador)
    {
        return response()->json($this->objetivoService->genPlanillaEvalu($identificador), 201);
    }

    public function getObjetivoConPlanillas($identificador)
    {
        return response()->json($this->objetivoService->getObjetivoConPlanillas($identificador), 201);
    }

    public function getObjetivosSinPlanillaEvalGener()
    {
        return response()->json($this->objetivoService->getObjetivosSinPlanillaEvalGener(), 200);
    }

    public function getObjetivosConPlanillaEvalGener()
    {
        return response()->json($this->objetivoService->getObjetivosConPlanillaEvalGener(), 200);
    }
}
