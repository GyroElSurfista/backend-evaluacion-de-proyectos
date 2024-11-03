<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroEvaluacion extends Model
{
    use HasFactory;
    protected $table = 'ParametroEvaluacion';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function estructuraPlantilla()
    {
        return $this->hasMany(EstructuraPlantilla::class, 'identificadorParamEvalu');
    }
    public function paramEvaluCuali()
    {
        return $this->hasMany(ParametroEvaluacionCualitativo::class, 'identificadorParamEvalu');
    }
    public function paramEvaluCuant()
    {
        return $this->hasMany(ParametroEvaluacionCuantitativo::class, 'identificadorParamEvalu');
    }
}
