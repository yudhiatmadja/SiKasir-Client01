@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit Admin</h1>
    <form action="{{ route('admin.update', $admin) }}" method="POST" class="space-y-4 max-w-md">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $admin->name }}" class="w-full p-2 border rounded" required>
        <input type="text" name="username" value="{{ $admin->username }}" class="w-full p-2 border rounded" required>
        <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full p-2 border rounded">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
