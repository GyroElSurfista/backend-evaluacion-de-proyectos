<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'identificadorPerso',
        'identificadorGrupoEmpre',
        'identificadorRol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grupoEmpresa()
    {
        return $this->belongsTo(GrupoEmpresa::class, 'identificadorGrupoEmpre');
    }

    public function usuarioRol()
    {
        return $this->hasMany(UsuarioRol::class, 'identificadorUsua', 'id');
    }

    public function asistencia()
    {
        return $this->hasMany(Asistencia::class, 'identificadorUsuar', 'id');
    }

    public function asignEvalu()
    {
        return $this->hasMany(Asignacion::class, 'identificadorUsuarEvalu', 'id');
    }

    public function asignEsEvalu()
    {
        return $this->hasMany(Asignacion::class, 'identificadorUsuarEsEvalu', 'id');
    }

    public function plantillaEvaluFinal()
    {
        return $this->hasMany(PlantillaEvaluacionFinal::class, 'identificadorUsuar', 'id');
    }
}
