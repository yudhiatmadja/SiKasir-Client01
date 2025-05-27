@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Dashboard Owner</h2>

    <div class="grid grid-cols-2 gap-4">
        <div class="p-4 border rounded shadow">
            <p class="text-lg font-semibold">Transaksi Hari Ini</p>
            <p class="text-3xl text-blue-600">{{ $transaksiHariIni }}</p>
        </div>
        <div class="p-4 border rounded shadow">
            <p class="text-lg font-semibold">Pendapatan Hari Ini</p>
            <p class="text-3xl text-green-600">Rp{{ number_format($pendapatan) }}</p>
        </div>
    </div>
</div>
@endsection
