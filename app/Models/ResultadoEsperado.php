<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoEsperado extends Model
{
    use HasFactory;
    protected $table = 'ResultadoEsperado';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'identificadorActiv');
    }
}
