<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrarAsistenciaRequest;
use App\Http\Requests\RegistrarInasistenciaRequest;
use App\Services\AsistenciaService;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{

    protected AsistenciaService $asistenciaService;


    public function __construct(AsistenciaService $asistenciaService)
    {
        $this->asistenciaService = $asistenciaService;
    }

    public function registrarAsistencia(RegistrarAsistenciaRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->asistenciaService->registrarAsistencia($data), 201);
    }

    public function registrarInasistencia(RegistrarInasistenciaRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->asistenciaService->registrarInasistencia($data), 201);
    }

    public function getAsistenciaPorGrupoEmpresaYFecha(Request $request)
    {
        $grupoEmpresaId = $request->query('grupoEmpresaId');
        $fecha = $request->query('fecha');

        $result = $this->asistenciaService->getAsistenciaPorGrupoEmpresaYFecha($grupoEmpresaId, $fecha);

        return response()->json($result, 200);
    }
}
