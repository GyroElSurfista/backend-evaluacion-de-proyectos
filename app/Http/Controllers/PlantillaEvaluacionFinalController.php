<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearPlantillaEvaluacionFinalRequest;
use App\Services\PlantillaEvaluacionFinalService;
use CrearPlantillaEvaluacionFinal;
use Illuminate\Http\Request;

class PlantillaEvaluacionFinalController extends JWTController
{
    protected PlantillaEvaluacionFinalService $plantillaEvaluacionFinalService;

    public function __construct(PlantillaEvaluacionFinalService $plantillaEvaluacionFinalService)
    {
        parent::__construct();
        $this->plantillaEvaluacionFinalService = $plantillaEvaluacionFinalService;
    }


    public function index()
    {
        return response()->json($this->plantillaEvaluacionFinalService->index(), 200);
    }

    public function crearPlantEvaluFinal(CrearPlantillaEvaluacionFinalRequest $request)
    {
        $data = $request->validated();
        $data['identificadorUsuar'] = $this->user->id;
        $data['fechaActua'] = $request->input("fechaActua");

        return response()->json($this->plantillaEvaluacionFinalService->crearPlantEvaluFinal($data), 201);
    }

    public function eliminarPlantilla($identificador)
    {
        return response()->json([
            "mensaje" => $this->plantillaEvaluacionFinalService->eliminarPlantilla($identificador),
        ], 200);
    }
}
