<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CriterioEvaluacionFinalService;

class CriterioEvaluacionFinalController extends Controller
{
    protected CriterioEvaluacionFinalService $criterioService;

    public function __construct(CriterioEvaluacionFinalService $criterioService)
    {
        $this->criterioService = $criterioService;
    }

    public function index()
    {
        return response()->json($this->criterioService->index(), 200);
    }
}
