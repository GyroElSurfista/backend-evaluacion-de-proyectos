<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearObjetivoRequest;
use App\Http\Requests\StoreEntregableRequest;
use App\Http\Requests\SearchObjetivoRequest;
use App\Services\ObjetivoService;
use App\Models\Objetivo;
use Exception;
use App\Http\Requests\UpdateRevisionCriterioRequest;
use App\Utils\FechasUtil;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    protected $objetivoService;

    public function  __construct(ObjetivoService $objetivoService)
    {
        $this->objetivoService = $objetivoService;
    }

    public function index(Request $request)
    {

        return response()->json($this->objetivoService->index($request->input('identificadorUsuar'), $request->input('semestre')), 200);
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

    public function getActividadesConResultadosPorObjetivo($objetivoId, Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        $result = $this->objetivoService->getActividadesConResultadosPorObjetivo($objetivoId, $fechaActua);

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
        $fechaActua = $request->input('fechaActua');
        return response()->json($this->objetivoService->storeEntregable($data, $fechaActua), 201);
    }

    public function getPlanillas($identificador)
    {
        return response()->json($this->objetivoService->getPlanillas($identificador), 200);
    }

    public function genPlanillas($identificador)
    {
        return response()->json($this->objetivoService->genPlanillas($identificador), 200);
    }

    public function genPlanillaEvalu($identificador, Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        return response()->json($this->objetivoService->genPlanillaEvalu($identificador, $fechaActua), 201);
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

    public function puedeSerLlenado($objetivoId, Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        $result = $this->objetivoService->puedeSerLlenado($objetivoId, $fechaActua);

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


    public function obtenerObjetivosQuePuedenSerEvaluados($planificacionId, Request $request)
    {
        $fechaActua = $request->input('fechaActua');
        $result = $this->objetivoService->obtenerObjetivosQuePuedenSerEvaluados($planificacionId, $fechaActua);
        return response()->json($result, $result['status']);
    }

    public function evaluarEntregables(Request $request, $objetivoId)
    {
        $criteriosAceptacionIds = $request->input('criteriosAceptacionIds');
        $cumple = $request->input('cumple');
        $fechaActua = $request->input('fechaActua');

        $result = $this->objetivoService->evaluarEntregables($objetivoId, $criteriosAceptacionIds, $cumple, $fechaActua);
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
