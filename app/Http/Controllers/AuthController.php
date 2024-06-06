<?php

namespace App\Http\Controllers;

use App\Events\NewUserCreated;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(StoreRegisterRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_validated' => User::IS_INVALID_EMAIL,
            'remember_token' => Str::random(10).time(),
        ]);

        NewUserCreated::dispatch($user);

        return response(['message' => 'User registered successfully']);
    }

    public function verifyEmail(Request $request)
    {
        $user = User::where('remember_token', $request->token)->firstOrFail();
        $user->update([
            'is_validated' => User::IS_VALID_EMAIL,
            'email_verified_at' => now(),
        ]);

        return redirect('/login');
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
