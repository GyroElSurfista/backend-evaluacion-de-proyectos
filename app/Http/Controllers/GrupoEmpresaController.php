<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoEmpresa;
use App\Models\User;

class GrupoEmpresaController extends Controller
{
    public function index()
    {
        $grupoEmpresas = GrupoEmpresa::all();
        return response()->json($grupoEmpresas, 200);
    }

    //funcion para obtener todos los usuarios de una grupo empresa
    public function getUsuarios($identificador)
    {
        $grupoEmpresa = GrupoEmpresa::find($identificador);
        if ($grupoEmpresa == null) {
            return response()->json(['error' => 'Grupo empresa no encontrado'], 404);
        }
        $usuarios = $grupoEmpresa->usuarios;
        return response()->json($usuarios, 200);
    }
}
