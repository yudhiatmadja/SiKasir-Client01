<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kasir App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 text-gray-900 min-h-screen">

    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/5 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/5 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <!-- Floating Elements -->
    <div class="fixed top-20 left-10 w-2 h-2 bg-blue-400/30 rounded-full animate-float z-0"></div>
    <div class="fixed top-40 right-20 w-3 h-3 bg-indigo-400/20 rounded-full animate-float-delayed z-0"></div>
    <div class="fixed bottom-32 left-1/4 w-1.5 h-1.5 bg-purple-400/25 rounded-full animate-float-slow z-0"></div>

    <div class="flex min-h-screen relative z-10">
        {{-- Sidebar - Hidden on login and register pages --}}
        @if(!request()->is('login') && !request()->is('register'))
            <div class="w-72 bg-white/80 backdrop-blur-xl shadow-2xl border-r border-gray-200/50">
                <!-- Sidebar Header -->
                <div class="p-6 border-b border-gray-200/50">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Kasir App</h2>
                            <p class="text-sm text-gray-500">Point of Sale System</p>
                        </div>
                    </div>
                </div>

                <!-- User Info -->
                @auth
                <div class="p-6 border-b border-gray-200/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ implode(" ",array_slice(explode(' ', Auth::user()->name), 0, 2)) }}</p>
                            <p class="text-sm text-gray-500 capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                </div>
                @endauth

                <!-- Navigation Menu -->
                <nav class="p-6">
                    <ul class="space-y-2">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200' : '' }}">
                                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('produk.index') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group {{ request()->routeIs('produk.*') ? 'bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200' : '' }}">
                                        <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Produk</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transaksi.index') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-200 group {{ request()->routeIs('transaksi.*') ? 'bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200' : '' }}">
                                        <div class="p-2 bg-green-100 rounded-lg group-hover:bg-green-200 transition-colors">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Transaksi</span>
                                    </a>
                                </li>
                            @elseif(Auth::user()->role === 'owner')
                                <li>
                                    <a href="{{ route('owner.dashboard') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group {{ request()->routeIs('owner.dashboard') ? 'bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200' : '' }}">
                                        <div class="p-2 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('owner.laporan') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-emerald-50 hover:to-green-50 transition-all duration-200 group {{ request()->routeIs('owner.laporan') ? 'bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200' : '' }}">
                                        <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Laporan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('owner.grafik') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-orange-50 hover:to-yellow-50 transition-all duration-200 group {{ request()->routeIs('owner.grafik') ? 'bg-gradient-to-r from-orange-50 to-yellow-50 border border-orange-200' : '' }}">
                                        <div class="p-2 bg-orange-100 rounded-lg group-hover:bg-orange-200 transition-colors">
                                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Grafik</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('owner.stok') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group {{ request()->routeIs('owner.stok') ? 'bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200' : '' }}">
                                        <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Stok</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('owner.riwayat') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-blue-50 transition-all duration-200 group {{ request()->routeIs('owner.riwayat') ? 'bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200' : '' }}">
                                        <div class="p-2 bg-indigo-100 rounded-lg group-hover:bg-indigo-200 transition-colors">
                                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Riwayat Transaksi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('owner.admin.index') }}" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-200 group {{ request()->routeIs('owner.admin.index') || request()->routeIs('owner.admin.create') || request()->routeIs('owner.admin.edit') ? 'bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200' : '' }}">
                                        <div class="p-2 bg-red-100 rounded-lg group-hover:bg-red-200 transition-colors">
                                            <svg class="w-5 h-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>


                                        </div>
                                        <span class="font-medium text-gray-700 group-hover:text-gray-900">Kelola Admin</span>
                                    </a>
                                </li>
                            @endif

                            <!-- Logout Button -->
                            <li class="pt-4 border-t border-gray-200/50">
                                <form action="{{ route('logout') }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-200 group w-full text-left">
                                        <div class="p-2 bg-red-100 rounded-lg group-hover:bg-red-200 transition-colors">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-red-600 group-hover:text-red-700">Logout</span>
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        @endif

        {{-- Main Content --}}
        <div class="flex-1 min-h-screen">
            <div class="p-8">
                {{-- Alert Messages --}}
                @if(session('success'))
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 px-6 py-4 rounded-2xl mb-6 shadow-lg backdrop-blur-sm">
                        <div class="flex items-center">
                            <div class="p-2 bg-green-200 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 shadow-lg backdrop-blur-sm">
                        <div class="flex items-center">
                            <div class="p-2 bg-red-200 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl mb-6 shadow-lg backdrop-blur-sm">
                        <div class="flex items-start">
                            <div class="p-2 bg-red-200 rounded-lg mr-3 mt-1">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium mb-2">Terjadi kesalahan:</p>
                                <ul class="space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="text-sm">• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(180deg);
            }
        }

        @keyframes float-delayed {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-12px) rotate(-180deg);
            }
        }

        @keyframes float-slow {
            0%, 100% {
                transform: translateY(0px) scale(1);
            }
            50% {
                transform: translateY(-8px) scale(1.1);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
            animation-delay: 3s;
        }

        .animate-float-slow {
            animation: float-slow 12s ease-in-out infinite;
            animation-delay: 6s;
        }
    </style>
    @yield('js')
</body>
</html>
