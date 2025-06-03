@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Stok Produk</h1>
                    <p class="text-gray-600">Kelola dan pantau stok produk Anda dengan mudah</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Produk -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Produk</p>
                    <p class="text-3xl font-bold text-gray-900">{{ count($produk) }}</p>
                </div>
            </div>

            <!-- Stok Rendah -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Stok Rendah</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $produk->where('stok', '<', 10)->count() }}</p>
                </div>
            </div>

            <!-- Total Nilai Stok -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Nilai Stok</p>
                    <p class="text-2xl font-bold text-gray-900">Rp{{ number_format($produk->sum(function($p) { return $p->stok * $p->harga; })) }}</p>
                </div>
            </div>

            <!-- Stok Tersedia -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Stok Tersedia</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $produk->where('stok', '>', 0)->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Daftar Produk</h2>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                        <span class="text-sm text-gray-600">{{ count($produk) }} produk terdaftar</span>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($produk as $p)
                    <div class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg border border-gray-100 overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
                        <!-- Product Image -->
                        <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                            @if ($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}"
                                     alt="Foto {{ $p->nama }}"
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-full h-full hidden items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Stock Status Badge -->
                            <div class="absolute top-3 right-3">
                                @if($p->stok >= 10)
                                    <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-lg font-medium shadow-lg">Stok Baik</span>
                                @elseif($p->stok >= 0)
                                    <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded-lg font-medium shadow-lg">Stok Rendah</span>
                                @else
                                    <span class="px-2 py-1 bg-red-500 text-white text-xs rounded-lg font-medium shadow-lg">Habis</span>
                                @endif
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">{{ $p->nama }}</h3>

                            <!-- Price -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <span class="text-xl font-bold text-green-600">Rp{{ number_format($p->harga) }}</span>
                                </div>
                            </div>

                            <!-- Stock Info -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Stok</p>
                                        <p class="font-bold text-gray-900">{{ $p->stok }} unit</p>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div class="flex-1 ml-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        @php
                                            $maxStock = 100; // Assume max stock for visualization
                                            $percentage = min(($p->stok / $maxStock) * 100, 100);
                                        @endphp
                                        <div class="h-2 rounded-full transition-all duration-300
                                            @if($p->stok > 10) bg-green-500
                                            @elseif($p->stok > 0) bg-yellow-500
                                            @else bg-red-500 @endif"
                                            style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-purple-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-blue-400 rounded-full animate-float-delayed opacity-40"></div>
    <div class="absolute bottom-32 left-20 w-4 h-4 bg-indigo-300 rounded-full animate-float-slow opacity-50"></div>
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

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
