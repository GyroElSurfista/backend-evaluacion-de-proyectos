<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Services\ActividadService;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    protected $actividadService;

    public function __construct(ActividadService $actividadService)
    {
        $this->actividadService = $actividadService;
    }

    public function index()
    {
        $actividades = $this->actividadService->getAllActividades();
        return response()->json($actividades, 200);
    }

    public function getObservaciones($identificador)
    {
        $result = $this->actividadService->getObservaciones($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }

    public function store(ActividadRequest $request)
    {
        $result = $this->actividadService->createActividad($request->validated());
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 201);
    }
}