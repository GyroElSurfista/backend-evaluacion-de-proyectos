<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaSeguimiento extends Model
{
    use HasFactory;
    protected $table = 'PlanillaSeguimiento';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'identificadorObjet');
    }

    public function actividadSeguimiento()
    {
        return $this->hasMany(ActividadSeguimiento::class, 'identificadorPlaniSegui', 'identificador');
    }
}
