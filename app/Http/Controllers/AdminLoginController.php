<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_roles_id == 5) {
                return redirect()->route('controladmin.index');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['msg' => 'Access denied.']);
            }
        }

        return redirect()->route('admin.login')->withErrors(['msg' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
