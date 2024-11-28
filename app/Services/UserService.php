<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => $data['fechaActua'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(10),
            'created_at' => $data['fechaActua'],
            'updated_at' => $data['fechaActua'],
            'identificadorPerso' => $data['identificadorPerso'],
            'identificadorGrupoEmpre' => $data['identificadorGrupoEmpre'],
            'identificadorRol' => $data['identificadorRol'],
        ]);
    }
}
