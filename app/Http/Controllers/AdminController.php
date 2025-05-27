<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = \App\Models\User::where('role', 'admin')->get();
        return view('admin.index', compact('admins'));
    }


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit(User $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name'     => 'required|string',
            'username' => 'required|unique:users,username,' . $admin->id,
            'password' => 'nullable|min:6',
        ]);

        $admin->name     = $request->name;
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin diperbarui');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin dihapus');
    }
}
