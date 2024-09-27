<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearObjetivoRequest;
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
        $objetivos = Objetivo::all();
        return response()->json($objetivos, 200);
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
        $objetivo = Objetivo::find($identificador);
        if ($objetivo == null) {
            return response()->json(['error' => 'Objetivo no encontrado'], 404);
        }
        $actividades = $objetivo->actividad;
        return response()->json($actividades, 200);
    }
}
