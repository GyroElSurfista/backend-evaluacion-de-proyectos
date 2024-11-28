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

    public function index()
    {
        return response()->json($this->planificacionService->index());
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

    public function getObjetivosParaActividades(Request $request, $identificador)
    {
        $fechaActua = $request->input("fechaActua");
        return response()->json($this->planificacionService->getObjetivosParaActividades($identificador, $fechaActua), 200);
    }

    public function getObjetivosConActividades($id)
    {
        $result = $this->planificacionService->getObjetivosConActividades($id);
        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }
        return response()->json($result);
    }

    public function getActividadesConResultados(Request $request, $id)
    {
        $fechaActua = $request->input("fechaActua");
        $actividades = $this->planificacionService->getActividadesConResultados($id, $fechaActua);
        return response()->json($actividades);
    }

    public function getObservacionesDePlanificacion($id)
    {
        $observaciones = $this->planificacionService->getObservacionesDePlanificacion($id);
        return response()->json($observaciones);
    }

    public function generarPlaniSeguiSemanObjet(Request $request, $id)
    {
        $fechaActua = $request->input("fechaActua");
        return response()->json($this->planificacionService->generarPlaniSeguiSemanObjet($id, $fechaActua), 201);
    }

    public function getObjetConPlaniSegui($id)
    {
        return response()->json($this->planificacionService->getObjetConPlaniSegui($id), 200);
    }
}
