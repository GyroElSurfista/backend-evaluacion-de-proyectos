<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaMotivo extends Model
{
    use HasFactory;
    protected $table = 'AsistenciaMotivo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class, 'identificadorAsist');
    }

    public function motivo()
    {
        return $this->belongsTo(Motivo::class, 'identificadorMotiv');
    }
}
