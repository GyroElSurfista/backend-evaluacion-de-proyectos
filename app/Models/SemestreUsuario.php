<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemestreUsuario extends Model
{
    use HasFactory;
    protected $table = 'SemestreUsuario';
    protected $primaryKey = 'identificador';
    protected $guarded = [];


    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'identificadorSemes');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'identificadorUsuar');
    }
}
