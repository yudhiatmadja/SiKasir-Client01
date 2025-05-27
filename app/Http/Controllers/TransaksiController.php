<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $produks = Produk::where('stok', '>', 0)->get();
        return view('transaksi.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array',
            'produk_id.*' => 'required|exists:produks,id',
            'kuantitas' => 'required|array',
            'kuantitas.*' => 'required|integer|min:1',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        // Hitung total dan validasi stok
        $total = 0;
        $subtotals = [];

        foreach ($request->produk_id as $index => $id) {
            $produk = Produk::find($id);
            $qty = $request->kuantitas[$index];

            // Validasi stok
            if ($produk->stok < $qty) {
                return back()->withErrors(['stok' => "Stok {$produk->nama} tidak mencukupi. Stok tersedia: {$produk->stok}"]);
            }

            $subtotal = $produk->harga * $qty;
            $subtotals[] = ['produk' => $produk, 'qty' => $qty, 'subtotal' => $subtotal];
            $total += $subtotal;
        }

        // Validasi pembayaran
        if ($request->jumlah_bayar < $total) {
            return back()->withErrors(['jumlah_bayar' => 'Jumlah bayar tidak mencukupi']);
        }

        $kembalian = $request->jumlah_bayar - $total;

        // Gunakan database transaction untuk memastikan konsistensi data
        DB::beginTransaction();

        try {
            // Simpan transaksi utama dengan user_id yang valid
            $transaksi = Transaksi::create([
                'user_id' => Auth::id(), // Pastikan user sudah login
                'total_harga' => $total,
                'jumlah_bayar' => $request->jumlah_bayar,
                'kembalian' => $kembalian,
            ]);

            // Simpan detail transaksi dan update stok
            foreach ($subtotals as $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $item['produk']->id,
                    'kuantitas' => $item['qty'],
                    'subtotal' => $item['subtotal'],
                ]);

                // Update stok produk
                $item['produk']->decrement('stok', $item['qty']);
            }

            DB::commit();

            return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage()]);
        }
    }

    public function index()
    {
        $transaksis = Transaksi::with(['user', 'details.produk'])
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('transaksi.index', compact('transaksis'));
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['user', 'details.produk']);
        return view('transaksi.show', compact('transaksi'));
    }
}
