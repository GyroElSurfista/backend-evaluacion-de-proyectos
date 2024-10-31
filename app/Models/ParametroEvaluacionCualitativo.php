<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroEvaluacionCualitativo extends Model
{
    use HasFactory;
    protected $table = 'ParametroEvaluacionCualitativo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function campo()
    {
        return $this->hasMany(Campo::class, 'identificadorEvaluCuali');
    }
    public function parametroEvalu()
    {
        return $this->belongsTo(ParametroEvaluacion::class, 'identificadorParamEvalu');
    }
}
