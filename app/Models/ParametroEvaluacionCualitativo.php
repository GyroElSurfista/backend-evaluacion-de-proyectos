<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroEvaluacionCualitativo extends Model
{
    use HasFactory;
    protected $table = 'ParametroEvaluacionCualitativo';
    protected $primaryKey = 'identificadorParamEvaluCuali';
    protected $guarded = [];
    public $timestamps = false;

    public function campos()
    {
        return $this->hasMany(Campo::class, 'identificadorParamEvaluCuali');
    }
    public function parametroEvalu()
    {
        return $this->belongsTo(ParametroEvaluacion::class, 'identificadorParamEvalu');
    }
}
