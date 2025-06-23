<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hariIni = Carbon::today();
        $transaksiHariIni = Transaksi::whereDate('created_at', $hariIni)->where("user_id", Auth::user()->id)->count();

        $jumlahStokBanyak = Produk::max("stok");
        $produkStokTerbanyak = Produk::where("stok", $jumlahStokBanyak)->first();

        $jumlahStokRendah = Produk::min("stok");
        $produkStokTerendah = Produk::where("stok", $jumlahStokRendah)->first();

        return view('dashboard_admin.index', compact('transaksiHariIni', 'produkStokTerbanyak', 'produkStokTerendah'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);

        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
        ]);

        $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus!');
    }
}
