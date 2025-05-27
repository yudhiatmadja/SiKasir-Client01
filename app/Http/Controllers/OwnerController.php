<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $hariIni = Carbon::today();
        $transaksiHariIni = Transaksi::whereDate('created_at', $hariIni)->count();
        $pendapatan = Transaksi::whereDate('created_at', $hariIni)->sum('total_harga');

        return view('owner.dashboard', compact('transaksiHariIni', 'pendapatan'));
    }

    public function laporan(Request $request)
    {
        $tipe = $request->input('tipe', 'harian');

        if ($tipe == 'mingguan') {
            $tanggal = Carbon::now()->subDays(7);
        } elseif ($tipe == 'bulanan') {
            $tanggal = Carbon::now()->subDays(30);
        } else {
            $tanggal = Carbon::today();
        }

        $data = Transaksi::where('created_at', '>=', $tanggal)->get();

        $total = $data->sum('total_harga');
        $jumlahTransaksi = $data->count();
        $produkTerlaris = DetailTransaksi::select('produk_id', DB::raw('SUM(kuantitas) as total'))
                            ->groupBy('produk_id')
                            ->orderByDesc('total')
                            ->first();

        return view('owner.laporan', compact('data', 'total', 'jumlahTransaksi', 'produkTerlaris'));
    }

    public function grafik()
    {
        $data = Transaksi::selectRaw('DATE(created_at) as tanggal, SUM(total_harga) as total')
                        ->groupBy('tanggal')
                        ->orderBy('tanggal', 'asc')
                        ->get();

        return view('owner.grafik', compact('data'));
    }

    public function stok()
    {
        $produk = Produk::all();
        return view('owner.stok', compact('produk'));
    }

    public function riwayat()
    {
        $riwayat = Transaksi::with('user')->orderBy('created_at', 'desc')->get();
        return view('owner.riwayat', compact('riwayat'));
    }
}
