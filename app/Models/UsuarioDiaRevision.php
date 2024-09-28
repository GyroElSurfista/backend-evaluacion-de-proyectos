<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioDiaRevision extends Model
{
    use HasFactory;
    protected $table = 'UsuarioDiaRevision';
    protected $primaryKey = 'identificador';
    protected $guarded = [];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'identificadorUsua');
    }
    public function diaRevision()
    {
        return $this->belongsTo(DiaRevision::class, 'identificadorDiaRevision');
    }
}
