<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class JWTController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = User::findOrFail(1);
    }
}
