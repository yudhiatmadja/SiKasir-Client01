@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Kelola Admin</h1>
    <a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Admin</a>
    <table class="mt-4 w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Nama</th>
                <th class="p-2">Username</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr class="border-t">
                    <td class="p-2">{{ $admin->name }}</td>
                    <td class="p-2">{{ $admin->username }}</td>
                    <td class="p-2">
                        <a href="{{ route('admin.edit', $admin) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.destroy', $admin) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus admin ini?')" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
