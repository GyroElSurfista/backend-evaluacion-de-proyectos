<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(CreateUserRequest $request)
    {
        try {
            $user = $this->userService->createUser($request->validated());
            return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear usuario', 'message' => $e->getMessage()], 500);
        }
    }
}