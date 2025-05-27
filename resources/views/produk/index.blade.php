@extends('layouts.app')


@section("content")
<h2>Daftar Produk</h2>
<a href="{{ route('produk.create') }}">+ Tambah Produk</a>
<table border="1">
    <tr>
        <th>Nama</th><th>Harga</th><th>Stok</th><th>Foto</th><th>Aksi</th>
    </tr>
    @foreach ($produk as $p)
    <tr>
        <td>{{ $p->nama }}</td>
        <td>Rp{{ $p->harga }}</td>
        <td>{{ $p->stok }}</td>
        <td>
            @if ($p->foto)
                <img src="{{ asset('storage/'.$p->foto) }}" width="50">
            @endif
        </td>
        <td>
            <a href="{{ route('produk.edit', $p->id) }}">Edit</a>
            <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
