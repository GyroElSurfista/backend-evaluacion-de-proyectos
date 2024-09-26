<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionEntregable extends Model
{
    use HasFactory;
    protected $table = 'RevisionEntregable';
    protected $primaryKey = 'identificador';
    protected $guarded = [];

    public function entregable()
    {
        return $this->belongsTo(Entregable::class, 'identificadorEntre');
    }

    public function evaluacionObjetivo()
    {
        return $this->belongsTo(EvaluacionObjetivo::class, 'identificadorEvaluOjet');
    }

}
