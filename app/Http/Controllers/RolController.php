<?php

namespace App\Http\Controllers;

use App\Services\RolService;
use Illuminate\Http\Request;

class RolController extends Controller
{

    protected $rolService;

    public function __construct(RolService $rolService)
    {
        $this->rolService = $rolService;
    }
    public function getFunciones($identificador)
    {
        return response()->json($this->rolService->getFunciones($identificador), 200);
    }
}
