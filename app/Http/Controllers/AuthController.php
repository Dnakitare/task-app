<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(StoreRegisterRequest $request)
    {
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_validated' => User::IS_INVALID_EMAIL,
            'remember_token' => Str::random(10) . time(),
        ]);
        
        return response()->json([
            'message' => 'User registered successfully',
        ]);
    }

    public function login(LoginRequest $request)
    {
        //
    }

    public function logout(Request $request)
    {
        //
    }
}
