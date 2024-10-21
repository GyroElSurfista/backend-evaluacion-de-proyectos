<?php

namespace App\Http\Controllers;

use App\Services\MotivoService;
use Illuminate\Http\Request;

class MotivoController extends Controller
{
    protected MotivoService $motivoService;

    public function __construct(MotivoService $motivoService)
    {
        $this->motivoService = $motivoService;
    }

    public function getMotivos()
    {
        return response()->json($this->motivoService->getMotivos(), 200);
    }
}
