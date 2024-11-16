<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearObjetivoRequest;
use App\Http\Requests\StoreEntregableRequest;
use App\Http\Requests\SearchObjetivoRequest;
use App\Services\ObjetivoService;
use App\Models\Objetivo;
use Exception;
use App\Http\Requests\UpdateRevisionCriterioRequest;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    protected $objetivoService;

    public function  __construct(ObjetivoService $objetivoService)
    {
        $this->objetivoService = $objetivoService;
    }

    public function index()
    {

        return response()->json($this->objetivoService->index(), 200);
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

    public function getActividadesConResultadosPorObjetivo($objetivoId)
    {
        $result = $this->objetivoService->getActividadesConResultadosPorObjetivo($objetivoId);

        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }

        return response()->json($result, 200);
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

    public function searchObjetivo(SearchObjetivoRequest $request)
    {
        $nombre = $request->input('nombre');
        $planificacionId = $request->input('planificacion_id');
        $result = $this->objetivoService->buscarObjetivoPorNombre($nombre, $planificacionId);

        return response()->json($result, 200);
    }

    public function puedeSerLlenado($objetivoId)
    {
        $result = $this->objetivoService->puedeSerLlenado($objetivoId);

        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }

        return response()->json($result, 200);
    }

    public function obtenerObjetivoConEntregablesYCriterios($objetivoId)
    {
        $result = $this->objetivoService->obtenerObjetivoConEntregablesYCriterios($objetivoId);

        if (!$result) {
            return response()->json(['error' => 'Objetivo no encontrado'], 404);
        }

        return response()->json($result, 200);
    }


    public function obtenerObjetivosQuePuedenSerEvaluados($planificacionId)
    {
        $result = $this->objetivoService->obtenerObjetivosQuePuedenSerEvaluados($planificacionId);
        return response()->json($result, $result['status']);
    }

    public function evaluarEntregables(Request $request, $objetivoId)
    {
        $criteriosAceptacionIds = $request->input('criteriosAceptacionIds');
        $cumple = $request->input('cumple');

        $result = $this->objetivoService->evaluarEntregables($objetivoId, $criteriosAceptacionIds, $cumple);
        return response()->json($result, $result['status']);
    }

    public function obtenerCriteriosConRevisiones($objetivoId)
    {
        $result = $this->objetivoService->obtenerCriteriosConRevisiones($objetivoId);

        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }

        return response()->json($result, 200);
    }
}
