<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function create()
{
    $produk = Produk::all();
    return view('transaksi.create', compact('produk'));
}

public function store(Request $request)
{
    $request->validate([
        'produk_id.*' => 'required|exists:produks,id',
        'kuantitas.*' => 'required|integer|min:1',
        'jumlah_bayar' => 'required|integer|min:0',
    ]);

    $total = 0;
    $subtotals = [];

    foreach ($request->produk_id as $index => $id) {
        $produk = Produk::find($id);
        $qty = $request->kuantitas[$index];
        $subtotal = $produk->harga * $qty;
        $subtotals[] = ['produk' => $produk, 'qty' => $qty, 'subtotal' => $subtotal];
        $total += $subtotal;
    }

    $kembalian = $request->jumlah_bayar - $total;

    // Simpan transaksi utama
    $transaksi = Transaksi::create([
        'user_id' => Auth::id(),
        'total_harga' => $total,
        'jumlah_bayar' => $request->jumlah_bayar,
        'kembalian' => $kembalian,
    ]);

    // Simpan detail + kurangi stok
    foreach ($subtotals as $item) {
        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'produk_id' => $item['produk']->id,
            'kuantitas' => $item['qty'],
            'subtotal' => $item['subtotal'],
        ]);

        // Update stok
        $item['produk']->decrement('stok', $item['qty']);
    }

    return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan.');
}
}
