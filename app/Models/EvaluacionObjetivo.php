<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionObjetivo extends Model
{
    use HasFactory;
    protected $table = 'EvaluacionObjetivo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function revisionEntregable()
    {
        return $this->hasMany(RevisionEntregable::class, 'identificadorEvaluOjet');
    }

    public function revisionCriterioEntregable()
    {
        return $this->hasMany(RevisionCriterioEntregable::class, 'identificadorEvaluOjet');
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'identificadorObjet');
    }
}
