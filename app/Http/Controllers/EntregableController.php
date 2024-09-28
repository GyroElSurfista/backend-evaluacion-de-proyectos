<?php

namespace App\Http\Controllers;

use \App\Services\EntregableService;

class EntregableController extends Controller
{
    protected EntregableService $entregableService;

    public function __construct(EntregableService $entregableService)
    {
        $this->entregableService = $entregableService;
    }

    public function index()
    {
        $entregables = $this->entregableService->getAllEntregable();
        return response()->json($entregables, 200);
    }
}
