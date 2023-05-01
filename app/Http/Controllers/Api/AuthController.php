<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]); 

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            return response()->json([
                'code' => 200,
                'message' => 'Login success',
                'errors' => null,
                'data' => $user
            ]);
        }

        return response()->json([
            'code' => 400,
            'message' => 'Login failed',
            'errors' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate(User::registerRules(), [
            're-password.required' => 'The password confirm field is required.',
            're-password.same' => 'The password confirm and password must match.'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['api_token'] = User::getApiToken();
        $user = User::create($validated);

        return response()->json([
            'code' => 200,
            'message' => 'Register success',
            'errors' => null,
            'data' => $user
        ]);
    }
}
