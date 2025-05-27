@extends('layouts.app')

@section("content")
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-4xl mx-auto bg-white/60 backdrop-blur-xl p-8 rounded-2xl shadow-xl border border-white/30">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Transaksi Penjualan</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('transaksi.store') }}" class="space-y-6">
            @csrf

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-200 rounded-lg shadow-sm">
                    <thead class="bg-white/60 backdrop-blur border-b border-gray-300">
                        <tr>
                            <th class="text-left p-3 font-semibold text-gray-800">Produk</th>
                            <th class="text-left p-3 font-semibold text-gray-800">Kuantitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $p)
                        <tr class="hover:bg-white/40 transition">
                            <td class="p-3">
                                <label class="inline-flex items-center space-x-2">
                                    <input type="checkbox" name="produk_id[]" value="{{ $p->id }}" class="rounded border-gray-300 focus:ring-blue-500">
                                    <span>{{ $p->nama }} <span class="text-sm text-gray-500">(Rp{{ number_format($p->harga) }})</span></span>
                                </label>
                            </td>
                            <td class="p-3">
                                <input type="number" name="kuantitas[]" min="1" value="1" class="w-20 rounded-lg border-gray-300 focus:ring-blue-500 shadow-sm">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <label for="jumlah_bayar" class="block text-gray-800 font-medium mb-1">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" required class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm">
            </div>

            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
    <div class="absolute bottom-20 left-20 w-4 h-4 bg-blue-300 rounded-full animate-float-slow opacity-50"></div>
</div>

<!-- Custom Animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}
@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-180deg); }
}
@keyframes float-slow {
    0%, 100% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-10px) scale(1.1); }
}
.animate-float { animation: float 6s ease-in-out infinite; }
.animate-float-delayed { animation: float-delayed 8s ease-in-out infinite; animation-delay: 2s; }
.animate-float-slow { animation: float-slow 10s ease-in-out infinite; animation-delay: 4s; }
</style>
@endsection
