<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login.form');
    }

    public function showRegister(): View
    {
        return view('auth.register.form');
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:6',
            ]);

            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            Auth::login($user);
        }
        catch (\Exception $e) {
            dd($e);
        }

    }

}
