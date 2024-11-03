<?php

namespace App\Http\Controllers;

use App\Services\ParametroEvaluacionService;
use Illuminate\Http\Request;

class ParametroEvaluacionController extends Controller
{
    protected ParametroEvaluacionService $parametroEvaluacionService;

    public function __construct(ParametroEvaluacionService $parametroEvaluacionService)
    {
        $this->parametroEvaluacionService = $parametroEvaluacionService;
    }

    public function index()
    {
        return response()->json($this->parametroEvaluacionService->index(), 200);
    }
}
