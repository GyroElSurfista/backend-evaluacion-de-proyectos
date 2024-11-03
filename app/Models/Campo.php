<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;
    protected $table = 'Campo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function parametroEvaluCuali()
    {
        return $this->belongsTo(ParametroEvaluacionCualitativo::class, 'identificadorParamEvaluCuali');
    }
}
