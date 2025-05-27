@extends('layouts.app')

@section("content")
<h2>Edit Produk</h2>
<form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    Nama: <input type="text" name="nama" value="{{ $produk->nama }}"><br>
    Harga: <input type="number" name="harga" value="{{ $produk->harga }}"><br>
    Stok: <input type="number" name="stok" value="{{ $produk->stok }}"><br>
    Kategori: <input type="text" name="kategori" value="{{ $produk->kategori }}"><br>
    Foto: <input type="file" name="foto"><br>
    @if ($produk->foto)
        <img src="{{ asset('storage/'.$produk->foto) }}" width="100"><br>
    @endif
    <button type="submit">Update</button>
</form>
@endsection
