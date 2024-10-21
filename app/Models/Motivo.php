<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;
    protected $table = 'Motivo';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function asistenciaMotivo()
    {
        return $this->hasMany(AsistenciaMotivo::class, 'identificadorMotiv');
    }
}
