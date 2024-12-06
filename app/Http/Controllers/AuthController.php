<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'identificadorPerso' => 'required|exists:Persona,identificador',
            'identificadorRol' => 'required|exists:Rol,identificador',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'identificadorPerso' => $request->identificadorPerso,
        ]);

        UsuarioRol::create([
            'identificadorUsua' => $user->id,
            'identificadorRol' => $request->identificadorRol,
            'fechaDesde' => now(),
            'fechaHasta' => '2024-12-31',
        ]);

        $roles = UsuarioRol::where('identificadorUsua', $user->id)
            ->with('rol')
            ->get()
            ->map(function ($usuarioRol) {
                return [
                    'identificadorRol' => $usuarioRol->identificadorRol,
                    'nombreRol' => $usuarioRol->rol->descripcion,
                ];
            });

        $roleIds = $roles->pluck('identificadorRol')->toArray();
        $roleNames = $roles->pluck('nombreRol')->toArray();

        $token = JWTAuth::claims([
            'user_id' => $user->id,
            'role_ids' => $roleIds,
            'role_names' => $roleNames,
        ])->fromUser($user);

        return response()->json(compact('token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();
        $roles = UsuarioRol::where('identificadorUsua', $user->id)
            ->with('rol')
            ->get()
            ->map(function ($usuarioRol) {
                return [
                    'identificadorRol' => $usuarioRol->identificadorRol,
                    'nombreRol' => $usuarioRol->rol->descripcion,
                ];
            });

        $roleIds = $roles->pluck('identificadorRol')->toArray();
        $roleNames = $roles->pluck('nombreRol')->toArray();

        $token = JWTAuth::claims([
            'role_ids' => $roleIds,
            'role_names' => $roleNames,
        ])->fromUser($user);

        return response()->json(compact('token'), 200);
    }

    public function getUserFromToken(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            $payload = JWTAuth::getPayload();
            $roleIds = $payload->get('role_ids');
            $roleNames = $payload->get('role_names');

            return response()->json([
                'user_id' => $user->id,
                'role_ids' => $roleIds,
                'role_names' => $roleNames,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token is invalid'], 401);
        }
    }
}
