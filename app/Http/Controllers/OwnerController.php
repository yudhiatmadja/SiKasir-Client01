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

    public function riwayat_filter(Request $request)
    {
        $admin_filter = $request->input('admin_filter');
        $tanggal_filter = $request->input('tanggal_filter');

        $data = null;
        // dd($dataAdmin);

        switch($tanggal_filter){
            case "all":
                $data = Transaksi::with('user')->whereHas('user', function($query) use ($admin_filter) {
                            $query->where('name', 'like', '%' . $admin_filter . '%');
                        })->orderBy('created_at', 'desc')->get();
                break;
            case "today":
                $data = Transaksi::with('user')->where("created_at", Carbon::today())->whereHas('user', function($query) use ($admin_filter) {
                            $query->where('name', 'like', '%' . $admin_filter . '%');
                        })->orderBy('created_at', 'desc')->get();
                break;
            case "week":
                $data = Transaksi::with('user')->whereBetween('created_at', [
                            Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek()
                        ])->whereHas('user', function($query) use ($admin_filter) {
                            $query->where('name', 'like', '%' . $admin_filter . '%');
                        })->orderBy('created_at', 'desc')->get();
                break;
            case "month":
                $data = Transaksi::with('user')->whereBetween('created_at', [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth()
                        ])->whereHas('user', function($query) use ($admin_filter) {
                            $query->where('name', 'like', '%' . $admin_filter . '%');
                        })->orderBy('created_at', 'desc')->get();
                break;
        }

        return response()->json([
            'success' => true,
            'message' => 'Filter applied successfully',
            'data' => $data,
        ]);
    }
}
