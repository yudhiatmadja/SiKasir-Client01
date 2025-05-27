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
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Owner</h1>
                    <p class="text-gray-600">Selamat datang kembali! Berikut ringkasan bisnis Anda hari ini.</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">{{ date('l, d F Y') }}</p>
                    <p class="text-sm text-gray-400">{{ date('H:i') }} WIB</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Transaksi Hari Ini -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center text-green-500 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +12%
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Transaksi Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-900 mb-1">{{ $transaksiHariIni }}</p>
                    <p class="text-xs text-gray-500">dari kemarin</p>
                </div>
            </div>

            <!-- Pendapatan Hari Ini -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center text-green-500 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +8%
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Pendapatan Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-900 mb-1">Rp{{ number_format($pendapatan) }}</p>
                    <p class="text-xs text-gray-500">dari kemarin</p>
                </div>
            </div>

            <!-- Rata-rata Per Transaksi -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center text-green-500 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            +5%
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Rata-rata Per Transaksi</p>
                    <p class="text-3xl font-bold text-gray-900 mb-1">Rp{{ $transaksiHariIni > 0 ? number_format($pendapatan / $transaksiHariIni) : '0' }}</p>
                    <p class="text-xs text-gray-500">nilai rata-rata</p>
                </div>
            </div>

            <!-- Status Sistem -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="flex items-center text-green-500 text-sm font-medium">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                            Online
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Status Sistem</p>
                    <p class="text-3xl font-bold text-gray-900 mb-1">100%</p>
                    <p class="text-xs text-gray-500">sistem berjalan normal</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="/laporan" class="flex flex-col items-center p-4 bg-gray-50 hover:bg-blue-50 rounded-xl transition-all duration-200 hover:shadow-md group">
                    <div class="p-3 bg-blue-100 group-hover:bg-blue-200 rounded-xl mb-3 transition-colors">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-blue-700">Lihat Laporan</span>
                </a>

                <a href="/inventory" class="flex flex-col items-center p-4 bg-gray-50 hover:bg-green-50 rounded-xl transition-all duration-200 hover:shadow-md group">
                    <div class="p-3 bg-green-100 group-hover:bg-green-200 rounded-xl mb-3 transition-colors">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-green-700">Kelola Stok</span>
                </a>

                <a href="/users" class="flex flex-col items-center p-4 bg-gray-50 hover:bg-purple-50 rounded-xl transition-all duration-200 hover:shadow-md group">
                    <div class="p-3 bg-purple-100 group-hover:bg-purple-200 rounded-xl mb-3 transition-colors">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-purple-700">Kelola User</span>
                </a>

                <a href="/settings" class="flex flex-col items-center p-4 bg-gray-50 hover:bg-indigo-50 rounded-xl transition-all duration-200 hover:shadow-md group">
                    <div class="p-3 bg-indigo-100 group-hover:bg-indigo-200 rounded-xl mb-3 transition-colors">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-indigo-700">Pengaturan</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                <a href="/activities" class="text-blue-600 hover:text-blue-800 text-sm font-medium hover:underline">
                    Lihat Semua
                </a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M8 11v6h8v-6M8 11H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6a2 2 0 00-2-2h-2"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Sistem login berhasil</p>
                        <p class="text-xs text-gray-500">{{ date('H:i') }} - User: Admin</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">Transaksi berhasil diproses</p>
                        <p class="text-xs text-gray-500">{{ date('H:i', strtotime('-5 minutes')) }} - Kasir 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
    <div class="absolute bottom-32 left-20 w-4 h-4 bg-blue-300 rounded-full animate-float-slow opacity-50"></div>
    <div class="absolute bottom-48 right-10 w-2 h-2 bg-indigo-300 rounded-full animate-float opacity-30"></div>
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
@endsection
