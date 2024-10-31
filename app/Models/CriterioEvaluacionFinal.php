<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterioEvaluacionFinal extends Model
{
    use HasFactory;
    protected $table = 'CriterioEvaluacionFinal';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function estructuraPlantilla()
    {
        return $this->hasMany(EstructuraPlantilla::class, 'identificadorCriteEvaluFinal');
    }
}
