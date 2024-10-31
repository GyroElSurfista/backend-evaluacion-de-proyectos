<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantillaEvaluacionFinal extends Model
{
    use HasFactory;
    protected $table = 'PlantillaEvaluacionFinal';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;


    public function estructuraPlantilla()
    {
        return $this->hasMany(EstructuraPlantilla::class, 'identificadorPlantEvaluFinal');
    }
}
