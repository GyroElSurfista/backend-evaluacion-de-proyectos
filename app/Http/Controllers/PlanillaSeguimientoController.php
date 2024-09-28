<?php

namespace App\Http\Controllers;

use App\Services\PlanillaSeguimientoService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PlanillaSeguimientoController extends Controller
{
    protected PlanillaSeguimientoService $planillaSegService;

    public function __construct(PlanillaSeguimientoService $planillaSegService)
    {
        $this->planillaSegService = $planillaSegService;
    }
}
