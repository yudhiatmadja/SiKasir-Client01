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
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Riwayat Transaksi Admin</h1>
                    <p class="text-gray-600">Kelola dan pantau semua aktivitas transaksi administrator</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Transaksi -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Transaksi</p>
                    <p class="text-3xl font-bold text-gray-900">{{ count($riwayat) }}</p>
                </div>
            </div>

            <!-- Total Pendapatan -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-gray-900">Rp{{ number_format($riwayat->sum('total_harga')) }}</p>
                </div>
            </div>

            <!-- Admin Aktif -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Admin Aktif</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $riwayat->pluck('user.name')->unique()->filter()->count() }}</p>
                </div>
            </div>

            <!-- Transaksi Hari Ini -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Hari Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $riwayat->where('created_at', '>=', today())->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Filter & Pencarian</h2>
            <div class="flex flex-col md:flex-row gap-4">
                {{-- <form action="{{ url('/', []) }}" method="post"> --}}
                    @csrf

                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian Admin</label>
                        <div class="relative">
                            <input type="text" placeholder="Cari nama admin..." class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white" name="admin_filter" onchange="filters()">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rentang Tanggal</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white" name="tanggal_filter" onchange="filters()">
                            <option value="all">📅 Semua Waktu</option>
                            <option value="today">📆 Hari Ini</option>
                            <option value="week">📊 Minggu Ini</option>
                            <option value="month">📈 Bulan Ini</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl" onclick="filters()">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Filter
                        </button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Detail Riwayat Transaksi</h2>
                <div class="flex items-center space-x-2">
                    <a href="{{ url('owner/riwayat/export', []) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors text-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal & Waktu
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Total Transaksi
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Administrator
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="riwayat-table-body">
                        @forelse ($riwayat as $r)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $r->created_at->translatedFormat('d F Y') }}</div>
                                        <div class="text-sm text-gray-600">{{ $r->created_at->format('H:i') }} WIB</div>
                                        <div class="text-xs text-gray-400">{{ $r->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                                    <div>
                                        <div class="text-lg font-bold text-green-600">Rp {{ number_format($r->total_harga) }}</div>
                                        <div class="text-xs text-gray-500">Transaksi Berhasil</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-bold text-sm">{{ substr($r->user->name ?? 'U', 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $r->user->name ?? 'Unknown Admin' }}</div>
                                        <div class="text-sm text-gray-500">Administrator</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-xs font-medium">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Detail
                                    </button>
                                    <button class="px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors text-xs font-medium">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H9.414a1 1 0 01-.707-.293l-2-2H4a2 2 0 00-2 2v7a2 2 0 002 2h2"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6l-3-3m0 0l-3 3m3-3v9"></path>
                                        </svg>
                                        Print
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Transaksi</h3>
                                    <p class="text-gray-500">Riwayat transaksi admin akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination (if needed) -->
        @if(method_exists($riwayat, 'links'))
        <div class="mt-8 flex justify-center">
            {{ $riwayat->links() }}
        </div>
        @endif
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-indigo-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-purple-400 rounded-full animate-float-delayed opacity-40"></div>
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

/* Hover effects for table rows */
tbody tr:hover {
    background: linear-gradient(90deg, rgba(59, 130, 246, 0.05) 0%, rgba(99, 102, 241, 0.05) 100%);
}

/* Custom scrollbar */
.overflow-x-auto::-webkit-scrollbar {
    height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #3b82f6, #6366f1);
    border-radius: 10px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/locale/id.js"></script> --}}
<script>
    function filters() {
        const adminFilter = document.querySelector('input[name="admin_filter"]').value;
        const tanggalFilter = document.querySelector('select[name="tanggal_filter"]').value;
        const token = document.querySelector('input[name="_token"]').value;

        // let url = new URL(window.location.href);
        $.ajax({
            type: "get",
            url: location.origin+"/owner/riwayat/filter",
            data: {
                admin_filter: adminFilter,
                tanggal_filter: tanggalFilter,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);

                $("#riwayat-table-body").empty();
                if (response.data.length != 0) {
                    $.map(response.data, function (d, i) {
                        var date = new Date(d.created_at);
                        var dataDate = date.toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                        var dataTime = date.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        });
                        //  moment.locale('id');
                        var dataTimeago = moment(d.created_at).fromNow();
                        $("#riwayat-table-body").append(`
                         <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">${dataDate}</div>
                                                <div class="text-sm text-gray-600">${dataTime} WIB</div>
                                                <div class="text-xs text-gray-400">${dataTimeago}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                                            <div>
                                                <div class="text-lg font-bold text-green-600">${new Intl.NumberFormat('id-ID', {style: 'currency',currency: 'IDR',minimumFractionDigits: 0}).format(d.total_harga)}</div>
                                                <div class="text-xs text-gray-500">Transaksi Berhasil</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-white font-bold text-sm">${(d.user?.name || 'U').charAt(0)}</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">${d.user.name ?? 'Unknown Admin'}</div>
                                                <div class="text-sm text-gray-500">Administrator</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors text-xs font-medium">
                                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </button>
                                            <button class="px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors text-xs font-medium">
                                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H9.414a1 1 0 01-.707-.293l-2-2H4a2 2 0 00-2 2v7a2 2 0 002 2h2"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6l-3-3m0 0l-3 3m3-3v9"></path>
                                                </svg>
                                                Print
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        `);
                    });
                } else {
                    $("#riwayat-table-body").append(`
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Transaksi</h3>
                                    <p class="text-gray-500">Riwayat transaksi admin akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    `);
                }

            }
        });

        // url.searchParams.set('admin_filter', adminFilter);
        // url.searchParams.set('tanggal_filter', tanggalFilter);

        // window.location.href = url.toString();
    }
</script>
@endsection
