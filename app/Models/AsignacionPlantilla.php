<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionPlantilla extends Model
{
    use HasFactory;
    protected $primaryKey = 'identificador';
    protected $table = 'AsignacionPlantilla';
    protected $guarded = [];
    public $timestamps = false;

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class, 'identificadorAsign');
    }

    public function tipoAsignacion()
    {
        return $this->belongsTo(TipoAsignacion::class, 'identificadorTipoAsign');
    }

    public function plantEvaluFinal()
    {
        return $this->belongsTo(PlantillaEvaluacionFinal::class, 'identificadorPlantEvaluFinal');
    }
}
