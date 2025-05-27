@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Stok Produk</h2>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $p)
            <tr>
                <td class="border p-2">{{ $p->nama }}</td>
                <td class="border p-2">{{ $p->stok }}</td>
                <td class="border p-2">Rp{{ number_format($p->harga) }}</td>
                <td class="border p-2">
                    @if ($p->foto)
                        <img src="{{ asset('storage/produk/' . $p->foto) }}" alt="Foto Produk" class="w-16 h-16 object-cover">
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
