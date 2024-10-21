<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'Asistencia';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function motivoAsistencias()
    {
        return $this->hasMany(AsistenciaMotivo::class, 'identificadorAsist');
    }
}
