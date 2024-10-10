<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearPlanificacionRequest;
use App\Services\PlanificacionService;
use Illuminate\Http\Request;

class PlanificacionController extends Controller
{
    protected $planificacionService;

    public function __construct(PlanificacionService $planificacionService)
    {
        $this->planificacionService = $planificacionService;
    }

    public function createPlanificacion(CrearPlanificacionRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->planificacionService->createPlanificacion($data), 201);
    }

    public function getObjetivos($identificador)
    {
        return response()->json($this->planificacionService->getObjetivos($identificador), 200);
    }

    public function getObjetivosConActividades($id)
    {
        $result = $this->planificacionService->getObjetivosConActividades($id);
        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }
        return response()->json($result);
    }

    public function getActividadesConResultados($id)
    {
        $actividades = $this->planificacionService->getActividadesConResultados($id);
        return response()->json($actividades);
    }
}
