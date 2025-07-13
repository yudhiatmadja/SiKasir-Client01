<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Produk::pluck('kategori')
            ->countBy()
            ->keys();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $credentials = null;
        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produk', 'public');
        }
        if ($request->kategori != null) {
            $credentials =$request->validate([
                'nama' => 'required',
                'harga' => 'required|integer|min:0',
                'stok' => 'required|integer|min:0',
                'kategori' => 'nullable',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $credentials['foto'] = $path;
        } else if($request->kategori_choose != null){
            $credentials =$request->validate([
                'nama' => 'required',
                'harga' => 'required|integer|min:0',
                'stok' => 'required|integer|min:0',
                'kategori_choose' => 'nullable',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $credentials['foto'] = $path;
        }



        Produk::create($credentials);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $kategori = Produk::pluck('kategori')
            ->countBy()
            ->keys();
            // dd($kategori);
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $credentials = null;
        $path = $produk->foto;
         if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $path = $request->file('foto')->store('produk', 'public');
            $produk->foto = $path;
        }
        if ($request->kategori != null) {
            $credentials =$request->validate([
                'nama' => 'required',
                'harga' => 'required|integer|min:0',
                'stok' => 'required|integer|min:0',
                'kategori' => 'nullable',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $credentials['kategori'] = $request->kategori;
            $credentials['foto'] = $path;
        } else if($request->kategori_choose != null){
            $credentials =$request->validate([
                'nama' => 'required',
                'harga' => 'required|integer|min:0',
                'stok' => 'required|integer|min:0',
                'kategori_choose' => 'nullable',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $credentials['kategori'] = $request->kategori_choose;
            $credentials['foto'] = $path;
        }
        // dd($credentials);
        // if ($request->hasFile('foto')) {
        //     if ($produk->foto) {
        //         Storage::disk('public')->delete($produk->foto);
        //     }
        //     $path = $request->file('foto')->store('produk', 'public');
        //     $produk->foto = $path;
        // }

        $produk->update($credentials);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diubah.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
