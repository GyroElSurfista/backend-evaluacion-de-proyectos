<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservacionRequest;
use App\Http\Requests\PatchObservacionRequest;
use App\Services\ObservacionService;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    protected ObservacionService $observacionService;

    public function __construct(ObservacionService $observacionService)
    {
        $this->observacionService = $observacionService;
    }
    
    public function index()
    {
        $observaciones = $this->observacionService->getAllObservaciones();
        return response()->json($observaciones, 200);
    }

    public function store(ObservacionRequest $request)
    {
        $result = $this->observacionService->createObservacion($request->validated());
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 201);
    }

    public function destroy($identificador)
    {
        $result = $this->observacionService->deleteObservacion($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json(['message' => $result['message']], 200);
    }

    public function update(PatchObservacionRequest $request)
    {
        $data = $request->validated();
        $data['fecha'] = now()->format('Y-m-d');
        $observacion = $this->observacionService->update($data);

        return response()->json($observacion, 200);
    }

    public function getObservacionesPorObjetivoYPlanificacion(Request $request)
    {
        $objetivoId = $request->query('objetivoId');
        $planificacionId = $request->query('planificacionId');
        $result = $this->observacionService->getObservacionesPorObjetivoYPlanificacion($objetivoId, $planificacionId);
        return response()->json($result, 200);
    }

    public function getObservacionesPorFiltros(Request $request)
    {
        $objetivoId = $request->query('objetivoId');
        $planillaSeguimientoId = $request->query('planillaSeguimientoId');
        $planificacionId = $request->query('planificacionId');
        $result = $this->observacionService->getObservacionesPorFiltros($objetivoId, $planillaSeguimientoId, $planificacionId);
        return response()->json($result, 200);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');
        if (!is_array($ids)) {
            return response()->json(['error' => 'El campo ids es requerido y debe ser un array'], 400);
        }
        $result = $this->observacionService->deleteObservacionesEnConjunto($ids);
        return response()->json($result, $result['status']);
    }
}
