@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <!-- Background Floating Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-br from-indigo-200/30 to-transparent rounded-full blur-2xl"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-gradient-to-tr from-blue-200/30 to-transparent rounded-full blur-2xl"></div>
    </div>

    <div class="relative z-10 max-w-xl mx-auto bg-white/60 backdrop-blur-xl p-8 rounded-2xl shadow-xl border border-white/30">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Admin</h1>

        <form action="{{ route('admin.update', $admin) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                <input type="text" name="name" value="{{ $admin->name }}" required
                       class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Username</label>
                <input type="text" name="username" value="{{ $admin->username }}" required
                       class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah"
                       class="w-full p-3 border border-gray-300 rounded-xl shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-xl shadow hover:from-blue-600 hover:to-blue-700 transition transform hover:scale-105">
                    Update
                </button>
            </div>
        </form>
    </div>

    <!-- Floating Decorative Elements -->
    <div class="absolute top-32 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-80 right-10 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
</div>

<!-- Floating Animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
@keyframes float-delayed {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
}
.animate-float {
    animation: float 5s ease-in-out infinite;
}
.animate-float-delayed {
    animation: float-delayed 6s ease-in-out infinite;
    animation-delay: 1.5s;
}
</style>
@endsection
