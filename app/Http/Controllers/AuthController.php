<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login.form');
    }

    public function login(Request $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('home');
        }
        return redirect()->route('auth.login');
    }

    public function showRegister(): View
    {
        return view('auth.register.form');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'unique:users'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'string', 'min:8']
        ]);

        if ($validated->fails()) {
            return redirect()->route('auth.showRegister')->withErrors($validated);
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

}
