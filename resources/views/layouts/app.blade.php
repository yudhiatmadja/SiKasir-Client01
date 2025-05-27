<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kasir App</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <div class="w-64 bg-white shadow p-4">
            <h2 class="text-xl font-bold mb-4">Menu</h2>
            <ul class="space-y-2">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li><a href="{{ route('dashboard') }}" class="block">Dashboard</a></li>
                        <li><a href="{{ route('produk.index') }}" class="block">Produk</a></li>
                        <li><a href="{{ route('transaksi.create') }}" class="block">Transaksi</a></li>
                    @elseif(Auth::user()->role === 'owner')
                        <li><a href="{{ route('owner.dashboard') }}" class="block">Dashboard Owner</a></li>
                        <li><a href="{{ route('owner.laporan') }}" class="block">Laporan</a></li>
                        <li><a href="{{ route('owner.grafik') }}" class="block">Grafik</a></li>
                        <li><a href="{{ route('owner.stok') }}" class="block">Stok</a></li>
                        <li><a href="{{ route('owner.riwayat') }}" class="block">Riwayat Transaksi</a></li>
                        <li><a href="{{ route('admin.index') }}" class="block">Kelola Admin</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}" class="block text-red-500">Logout</a></li>
                @endauth
            </ul>
        </div>

        {{-- Main Content --}}
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>

</body>
</html>
