<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\DashboardController;


class AuthController extends Controller
{
    public function showLogin() {
    return view('auth.login');
}

public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'owner') {
            return redirect()->route('owner.dashboard');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
        }
    }

    return back()->withErrors(['login' => 'Username atau password salah.']);
}



public function logout() {
    Auth::logout();
    return redirect('/login');
}
}
