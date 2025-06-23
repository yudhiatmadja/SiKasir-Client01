@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Produk</h1>
                    <p class="text-gray-600">Perbarui informasi produk Anda</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('produk.index') }}" class="inline-flex items-center px-4 py-2 bg-white text-gray-700 rounded-xl border border-gray-200 hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Produk
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Informasi Produk</h2>
                <p class="text-gray-600 text-sm mt-1">Lengkapi form di bawah untuk memperbarui produk</p>
            </div>

            <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data" class="p-8">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama Produk -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Nama Produk
                            </label>
                            <input type="text" name="nama" value="{{ $produk->nama }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Masukkan nama produk">
                        </div>

                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Harga
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                                <input type="number" name="harga" value="{{ $produk->harga }}" required
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                                    placeholder="0">
                            </div>
                        </div>

                        <!-- Stok -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Stok
                            </label>
                            <input type="number" name="stok" value="{{ $produk->stok }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Jumlah stok">
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Kategori
                            </label>
                            {{-- <input type="text" name="kategori" value="{{ $produk->kategori }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Kategori produk"> --}}

                            <input type="text" name="kategori" class="mt-1 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400" id="kategori_input">
                            <select name="kategori_choose" class="mt-5 w-full px-4 py-2 rounded-xl bg-white/70 border border-gray-200 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400" id="kategori_choose" onclick="categories_choose()">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item }}" @if ($produk->kategori == $item) selected @endif>{{ $item}}</option>
                                @endforeach
                                {{-- <option value="Makanan">Makanan</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Pakaian">Pakaian</option> --}}
                            </select>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Current Photo -->
                        @if ($produk->foto)
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Foto Saat Ini
                            </label>
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <img src="{{ asset('storage/'.$produk->foto) }}"
                                    class="w-full h-48 object-cover rounded-lg shadow-sm"
                                    alt="Foto produk saat ini">
                            </div>
                        </div>
                        @endif

                        <!-- Upload New Photo -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                {{ $produk->foto ? 'Ganti Foto' : 'Upload Foto' }}
                            </label>
                            <div class="relative">
                                <input type="file" name="foto" accept="image/*" id="foto" class="hidden" onchange="previewImage(this)">
                                <label for="foto" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all duration-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-sm text-gray-500">
                                            <span class="font-medium">Klik untuk upload</span> atau drag & drop
                                        </p>
                                        <p class="text-xs text-gray-400">PNG, JPG hingga 2MB</p>
                                    </div>
                                </label>
                            </div>
                            <!-- Preview New Image -->
                            <div id="preview" class="mt-4 hidden">
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <img id="preview-img" class="w-full h-48 object-cover rounded-lg shadow-sm" alt="Preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('produk.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-medium">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-orange-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-yellow-400 rounded-full animate-float-delayed opacity-40"></div>
    <div class="absolute bottom-32 left-20 w-4 h-4 bg-orange-300 rounded-full animate-float-slow opacity-50"></div>
</div>

<!-- Custom Animations & Scripts -->
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
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').classList.remove('hidden');
            document.getElementById('preview-img').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
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
