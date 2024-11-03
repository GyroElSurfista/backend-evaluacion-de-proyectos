<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearPlantillaEvaluacionFinalRequest;
use App\Services\PlantillaEvaluacionFinalService;
use CrearPlantillaEvaluacionFinal;
use Illuminate\Http\Request;

class PlantillaEvaluacionFinalController extends Controller
{
    protected PlantillaEvaluacionFinalService $plantillaEvaluacionFinalService;

    public function __construct(PlantillaEvaluacionFinalService $plantillaEvaluacionFinalService)
    {
        $this->plantillaEvaluacionFinalService = $plantillaEvaluacionFinalService;
    }


    public function crearPlantEvaluFinal(CrearPlantillaEvaluacionFinalRequest $request)
    {
        $data = $request->validated();

        return response()->json($this->plantillaEvaluacionFinalService->crearPlantEvaluFinal($data), 201);
    }
}
