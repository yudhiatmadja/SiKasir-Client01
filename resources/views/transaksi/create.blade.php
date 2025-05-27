@extends('layouts.app')

@section("content")
    <h2>Transaksi Penjualan</h2>
    @if (session('success')) <p>{{ session('success') }}</p> @endif

    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf
        <table>
            <tr>
                <th>Produk</th><th>Kuantitas</th>
            </tr>
            @foreach ($produk as $p)
            <tr>
                <td>
                    <input type="checkbox" name="produk_id[]" value="{{ $p->id }}"> {{ $p->nama }} (Rp{{ $p->harga }})
                </td>
                <td>
                    <input type="number" name="kuantitas[]" min="1" value="1">
                </td>
            </tr>
            @endforeach
        </table>
        <br>
        <label>Jumlah Bayar: </label>
        <input type="number" name="jumlah_bayar" required><br><br>

        <button type="submit">Simpan Transaksi</button>
    </form>
@endsection
