<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function signup()
    {
        return view('app.auth.signup.index');
    }

    public function login()
    {
        return view('app.auth.login.index');
    }

    public function redirectTo()
    {
        return redirect()->route('home.index');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home.index'));
        }

        return back()->withErrors([
            'credentials' => 'Email ou senha incorretos.',
        ])->onlyInput('credentials');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.login'));
    }
}
