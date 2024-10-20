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

    public function getObjetivosConActividades($id)
    {
        $result = $this->grupoEmpresaService->getObjetivosConActividades($id);
        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }
        return response()->json($result);
    }


    public function getPlanificaciones($identificador)
    {
        $planificaciones = $this->grupoEmpresaService->getPlanificaciones($identificador);
        return response()->json($planificaciones);
    }

    public function getObjetivos($identificador)
    {
        $result = $this->grupoEmpresaService->getObjetivos($identificador);
        if (isset($result['status']) && $result['status'] == 404) {
            return response()->json(['error' => $result['error']], 404);
        }
        return response()->json($result, 200);
    }
}