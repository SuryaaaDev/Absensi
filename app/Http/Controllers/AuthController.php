<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        if (Auth::guard('student')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('student');
        }

        toast('Email atau Password anda salah.', 'error')->autoClose(3000)->timerProgressBar()->width('420px');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function logoutStudent(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
