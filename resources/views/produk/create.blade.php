<h2>Tambah Produk</h2>
<form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
    @csrf
    Nama: <input type="text" name="nama"><br>
    Harga: <input type="number" name="harga"><br>
    Stok: <input type="number" name="stok"><br>
    Kategori: <input type="text" name="kategori"><br>
    Foto: <input type="file" name="foto"><br>
    <button type="submit">Simpan</button>
</form>
