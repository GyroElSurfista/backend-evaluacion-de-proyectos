<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GrupoEmpresaService;

class GrupoEmpresaController extends Controller
{
    protected $grupoEmpresaService;

    public function __construct(GrupoEmpresaService $grupoEmpresaService)
    {
        $this->grupoEmpresaService = $grupoEmpresaService;
    }

    public function index()
    {
        $grupoEmpresas = $this->grupoEmpresaService->getAllGrupoEmpresas();
        return response()->json($grupoEmpresas, 200);
    }

    //funcion para obtener todos los usuarios de una grupo empresa
    public function getUsuarios($identificador)
    {
        $result = $this->grupoEmpresaService->getUsuarios($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }
}