@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Riwayat Transaksi Admin</h2>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $r)
            <tr>
                <td class="border p-2">{{ $r->created_at->format('Y-m-d H:i') }}</td>
                <td class="border p-2">Rp{{ number_format($r->total_harga) }}</td>
                <td class="border p-2">{{ $r->user->name ?? 'Unknown' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
