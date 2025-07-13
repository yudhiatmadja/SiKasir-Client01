@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Kelola Admin</h1>
                <p class="text-gray-600">Kelola dan pantau Admin anda dengan mudah</p>
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
    <!-- Background Gradient Layer -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-xl mx-auto bg-white/60 backdrop-blur-xl p-8 rounded-2xl shadow-xl border border-white/30">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Tambah Admin</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg shadow">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('owner.admin.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-800 font-medium mb-1" for="name">Nama</label>
                <input type="text" name="name" id="name" placeholder="Nama"
                    class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm"
                    required>
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1" for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username"
                    class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm"
                    required>
            </div>

            <div>
                <label class="block text-gray-800 font-medium mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"
                    class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm"
                    required>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-60 right-20 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
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
