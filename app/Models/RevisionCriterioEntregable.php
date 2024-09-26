<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionCriterioEntregable extends Model
{
    use HasFactory;
    protected $table = 'RevisionCriterioEntregable';
    protected $primaryKey = 'identificador';
    protected $guarded = [];

   public function evaluacionObjetivo()
    {
        return $this->belongsTo(EvaluacionObjetivo::class, 'identificadorEvaluObjet');
    }

    public function criterioAceptacionEntregable()
    {
        return $this->belongsTo(CriterioAceptacionEntregable::class, 'identificadorCriteAceptaEntre');
    }
    
}
