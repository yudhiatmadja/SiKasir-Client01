@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <!-- Background Floating Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-br from-indigo-200/30 to-transparent rounded-full blur-2xl"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-gradient-to-tr from-blue-200/30 to-transparent rounded-full blur-2xl"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto bg-white/60 backdrop-blur-xl p-8 rounded-2xl shadow-xl border border-white/30">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Kelola Admin</h1>
            <a href="{{ route('admin.create') }}"
               class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2 rounded-xl shadow hover:from-blue-600 hover:to-blue-700 transition transform hover:scale-105">
               + Tambah Admin
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-white/80 rounded-xl shadow-md">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">Username</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr class="border-t border-gray-200 hover:bg-gray-50 transition">
                            <td class="p-4">{{ $admin->name }}</td>
                            <td class="p-4">{{ $admin->username }}</td>
                            <td class="p-4 space-x-2">
                                <a href="{{ route('admin.edit', $admin) }}"
                                   class="inline-block text-blue-600 hover:underline transition">Edit</a>
                                <form action="{{ route('admin.destroy', $admin) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus admin ini?')"
                                            class="text-red-600 hover:underline transition ml-1">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">Belum ada data admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-40 right-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-72 left-10 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
</div>

<!-- Custom Animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-12px); }
}
@keyframes float-delayed {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.animate-float {
    animation: float 5s ease-in-out infinite;
}
.animate-float-delayed {
    animation: float-delayed 6s ease-in-out infinite;
    animation-delay: 2s;
}
</style>
@endsection
