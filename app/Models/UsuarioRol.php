<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;
    protected $table = 'UsuarioRol';
    protected $primaryKey = 'identificador';
    public $timestamps = false;
    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'identificadorUsua');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'identificadorRol');
    }
}
