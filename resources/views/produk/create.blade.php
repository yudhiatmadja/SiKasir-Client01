@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-2xl mx-auto bg-white/60 backdrop-blur-lg border border-white/30 rounded-2xl shadow-2xl p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Produk</h2>

        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama" class="mt-1 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" class="mt-1 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" class="mt-1 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" name="kategori" class="mt-1 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400" id="kategori_input" onchange="categories()" >
                <select name="kategori_choose" class="mt-5 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400" id="kategori_choose" onclick="categories_choose()" >
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item }}">{{ $item}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Produk</label>
                <input type="file" name="foto" class="mt-1 w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-white file:bg-blue-500 hover:file:bg-blue-600 transition-all duration-150">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-xl shadow-lg hover:from-green-600 hover:to-green-700 transition-all duration-200 text-lg font-semibold">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
    <div class="absolute bottom-32 left-20 w-4 h-4 bg-blue-300 rounded-full animate-float-slow opacity-50"></div>
</div>

<!-- Custom Animations -->
<style>
@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}
@keyframes float-delayed {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-15px) rotate(-180deg);
    }
}
@keyframes float-slow {
    0%, 100% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.1);
    }
}
.animate-float {
    animation: float 6s ease-in-out infinite;
}
.animate-float-delayed {
    animation: float-delayed 8s ease-in-out infinite;
    animation-delay: 2s;
}
.animate-float-slow {
    animation: float-slow 10s ease-in-out infinite;
    animation-delay: 4s;
}
</style>
<script>
        function categories() {
            var kategoriInput = '#kategori_input';
            var kategoriSelect = '#kategori_choose';
            $(kategoriSelect).attr("disabled", "true");
            if ($(kategoriInput).val() == "") {
                $(kategoriSelect).removeAttr("disabled");

            }
        }
        function categories_choose() {
            var kategoriInput = '#kategori_input';
            var kategoriSelect = '#kategori_choose';
            $(kategoriInput).attr("disabled", "true");
            if ($(kategoriSelect).val() == "") {
                $(kategoriInput).removeAttr("disabled");

            }
        }
    </script>
@endsection
{{-- @section('js')
    <script>
        // $(document).ready(function () {
        //     kategori();
        // });
        // setTimeout(() => {
        //     kategori();
        // }, 500);
        function kategori() {
            alert("Kategori telah dipilih");
            // var kategoriInput = document.querySelector('input[name="kategori"]');
            // var kategoriSelect = document.querySelector('select[name="kategori_choose"]');
            // $('select[name="kategori_choose"]').attr("disabled", "true");
        }
    </script>
@endsection --}}
