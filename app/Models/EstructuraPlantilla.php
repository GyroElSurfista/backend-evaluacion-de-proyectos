<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstructuraPlantilla extends Model
{
    use HasFactory;
    protected $table = 'EstructuraPlantilla';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function criterioEvaluFinal()
    {
        return $this->belongsTo(CriterioEvaluacionFinal::class, 'identificadorCriteEvaluFinal');
    }
    public function paramEvalu()
    {
        return $this->belongsTo(ParametroEvaluacion::class, 'identificadorParamEvalu');
    }
    public function plantillaEvaluFinal()
    {
        return $this->belongsTo(PlantillaEvaluacionFinal::class, 'identificadorPlantEvaluFinal');
    }

    public function valorAsignado()
    {
        return $this->hasMany(ValorAsignado::class, 'identificadorEstruPlant');
    }
}
