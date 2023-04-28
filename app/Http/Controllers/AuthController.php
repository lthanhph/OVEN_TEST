<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return view('auth/login', ['title' => 'Login']);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate(User::registerRules(), [
                're-password.required' => 'The password confirm field is required.',
                're-password.same' => 'The password confirm and password must match.'
            ]);
            $user = User::create($validated);

            Auth::login($user);

            return redirect()->intended('/');
        }

        return view('auth/register', ['title' => 'Register']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
