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

    public function showRegister() {
        return view('auth.register');
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

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['role'] = 'admin';
        User::create($credentials);

        $loginCredentials = $request->only('username', 'password');
        // dd(Auth::attempt($loginCredentials));
        if (Auth::attempt($loginCredentials)) {
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

        // return back()->withErrors(['login' => 'Username atau password salah.']);
    }



    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
