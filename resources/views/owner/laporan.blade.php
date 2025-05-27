@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Laporan Penjualan</h2>

    <form method="GET" class="mb-4">
        <select name="tipe" onchange="this.form.submit()" class="border p-2 rounded">
            <option value="harian" {{ request('tipe') == 'harian' ? 'selected' : '' }}>Harian</option>
            <option value="mingguan" {{ request('tipe') == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
            <option value="bulanan" {{ request('tipe') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
        </select>
    </form>

    <div class="mb-4">
        <p><strong>Total Pendapatan:</strong> Rp{{ number_format($total) }}</p>
        <p><strong>Jumlah Transaksi:</strong> {{ $jumlahTransaksi }}</p>
        <p><strong>Produk Terlaris:</strong> {{ $produkTerlaris->produk->nama ?? '-' }}</p>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <td class="border p-2">{{ $d->created_at->format('Y-m-d') }}</td>
                <td class="border p-2">Rp{{ number_format($d->total_harga) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
