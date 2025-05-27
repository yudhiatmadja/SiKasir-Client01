@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Admin</h1>
    <form action="{{ route('admin.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        <input type="text" name="name" placeholder="Nama" class="w-full p-2 border rounded" required>
        <input type="text" name="username" placeholder="Username" class="w-full p-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>
        <button class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
