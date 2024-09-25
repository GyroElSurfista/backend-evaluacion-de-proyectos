<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionObjetivo extends Model
{
    use HasFactory;
    protected $table = 'EvaluacionObjetivo';
    protected $guarded = [];

    public function revisionEntregable()
    {
        return $this->hasMany(RevisionEntregable::class, 'identificadorEvaluOjet');
    }

    public function revisionCriterioEntregable()
    {
        return $this->hasMany(RevisionCriterioEntregable::class, 'identificadorEvaluOjet');
    }
}
