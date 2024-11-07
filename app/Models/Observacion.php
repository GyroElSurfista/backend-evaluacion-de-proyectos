<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    protected $table = 'Observacion';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function actividadSeguimiento()
    {
        return $this->belongsTo(ActividadSeguimiento::class, 'identificadorActivSegui');
    }
}
