<?php

namespace App\Services;

use App\Exceptions\DuplicidadNombrePlantillaException;
use App\Models\EstructuraPlantilla;
use App\Models\PlantillaEvaluacionFinal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PlantillaEvaluacionFinalService
{

    public function index()
    {
        $plantillas = PlantillaEvaluacionFinal::with(['asignacionPlant'])->get();
        $plantillasComp = [];

        foreach ($plantillas as $plantilla) {
            $plantilla->setAttribute('debeEliminarLogic', $plantilla->asignacionPlant()->exists());
            $plantillaComp = $this->getPlantilla($plantilla->identificador);
            $plantillasComp[] = $plantillaComp;
        }

        return $plantillasComp;
    }

    public function crearPlantEvaluFinal($data)
    {
        $nombre = $data["nombre"];
        $rubricas = $data["rubricas"];

        if ($this->existeNombrePlantillaRegistradoUsuario($nombre, $data["identificadorUsuar"])) {
            throw new DuplicidadNombrePlantillaException("El usuario ya creó una plantilla con el mismo nombre.");
        }

        return DB::transaction(function () use ($data, $nombre, $rubricas) {
            $plantilla = PlantillaEvaluacionFinal::create([
                "nombre" => $nombre,
                "descripcion" => $data["descripcion"] ?? null,
                "puntaje" => $data["puntaje"],
                "identificadorUsuar" => $data["identificadorUsuar"],
                "fechaCreac" => Carbon::now(),
            ]);

            foreach ($rubricas as $rubrica) {
                EstructuraPlantilla::create([
                    "identificadorPlantEvaluFinal" => $plantilla->identificador,
                    "identificadorCriteEvaluFinal" => $rubrica['identificadorCriteEvaluFinal'] ?? null,
                    "identificadorParamEvalu" => $rubrica['identificadorParamEvalu'] ?? null,
                    "valorMaxim" => $rubrica['valorMaxim'] ?? null,
                ]);
            }

            return $this->getPlantilla($plantilla->identificador);
        });
    }

    public function getPlantilla($identificador)
    {
        $paramEvaluService = new ParametroEvaluacionService();
        $plantilla = PlantillaEvaluacionFinal::with('usuarioCread:id,name')->findOrFail($identificador);
        $rubricas = EstructuraPlantilla::where('identificadorPlantEvaluFinal', $identificador)->with(['criterioEvaluFinal', 'paramEvalu.paramEvaluCuali.campos', 'paramEvalu.paramEvaluCuant'])->get();

        foreach ($rubricas as $rubrica) {
            $rubrica->makeHidden(['identificador', 'identificadorPlantEvaluFinal', 'identificadorParamEvalu', 'identificadorCriteEvaluFinal']);
            $paramEvaluService->formatearParametro($rubrica->paramEvalu);
            if (!$rubrica->valorMaxim) {
                $rubrica->valorMaxim = $rubrica->paramEvalu->valorMaxim;
            }
        }

        $plantilla->setAttribute('rubricas', $rubricas);

        return $plantilla;
    }

    public function eliminarPlantilla($identificador)
    {
        $plantilla = PlantillaEvaluacionFinal::with('asignacionPlant')->findOrFail($identificador);

        if ($plantilla->asignacionPlant()->exists()) {
            $plantilla->eliminadoLogic = true;
            $plantilla->save();
            $mensaje = 'La plantilla se eliminó lógicamente.';
        } else {
            $plantilla->delete();
            $mensaje = 'La plantilla se eliminó físicamente.';
        }

        return $mensaje;
    }

    public function debeEliminarLogic($identificador)
    {
        return PlantillaEvaluacionFinal::findOrFail($identificador)->asignacionPlant()->exists();
    }

    private function existeNombrePlantillaRegistradoUsuario($nombre, $identificadorUsuar)
    {
        return PlantillaEvaluacionFinal::where('identificadorUsuar', $identificadorUsuar)->where('nombre', $nombre)->exists();
    }
}
