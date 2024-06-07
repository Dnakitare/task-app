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
        $user = User::where('remember_token', $request->token)->first();

        if ($user->is_validated === User::IS_VALID_EMAIL) {
            return redirect('/login');
        }

        $user->update([
            'is_validated' => User::IS_VALID_EMAIL,
            'email_verified_at' => now(),
        ]);

        return redirect('/login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! is_null($user)) {
            if ($user->is_validated === User::IS_INVALID_EMAIL) {
                NewUserCreated::dispatch($user);

                return response(['message' => 'Please verify your email address. A verification link has been sent to your email address.']);
            }

            if (! auth()->attempt($request->only('email', 'password'))) {
                return response(['message' => 'Invalid credentials'], 422);
            }

            return response([
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $user->createToken('authToken')->plainTextToken,
            ]);
        } else {
            return response(['message' => 'User not found. Please register to create an account.'], 422);
        }
    }

    public function logout(Request $request)
    {
        //
    }
}
