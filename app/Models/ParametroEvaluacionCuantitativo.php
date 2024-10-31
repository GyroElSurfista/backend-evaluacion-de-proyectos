<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroEvaluacionCuantitativo extends Model
{
    use HasFactory;
    protected $table = 'ParametroEvaluacionCuantitativo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;


    public function parametroEvalu()
    {
        return $this->belongsTo(ParametroEvaluacion::class, 'identificadorParamEvalu');
    }
}
