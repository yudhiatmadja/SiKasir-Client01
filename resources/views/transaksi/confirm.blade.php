@extends('layouts.app')

@section("content")
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6 relative">
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Kelola Transaksi</h1>
                <p class="text-gray-600">Kelola dan catat transaksi anda dengan mudah</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="p-3 bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-to-br from-blue-100/10 to-transparent rounded-full transform rotate-12"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-gradient-to-tr from-indigo-100/10 to-transparent rounded-full transform -rotate-12"></div>
    </div>

    <div class="relative max-w-4xl mx-auto bg-white/60 backdrop-blur-xl p-8 rounded-2xl shadow-xl border border-white/30">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Confirm Transaksi Penjualan</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- <form method="POST" action="{{ route('transaksi.store') }}" class="space-y-6">
            @csrf --}}

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-200 rounded-lg shadow-sm">
                    <thead class="bg-white/60 backdrop-blur border-b border-gray-300">
                        <tr>
                            <th class="text-left p-3 font-semibold text-gray-800">Produk</th>
                            <th class="text-left p-3 font-semibold text-gray-800">Kuantitas</th>
                            <th class="text-left p-3 font-semibold text-gray-800">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->details as $p)
                        {{-- @foreach ($p->produk as $detail) --}}

                                <tr class="hover:bg-white/40 transition">
                                    <td class="p-3">
                                        <label class="inline-flex items-center space-x-2">
                                            <span>{{ $p->produk->nama }} <span class="text-sm text-gray-500">(Rp{{ number_format($p->produk->harga) }})</span></span>
                                        </label>
                                    </td>
                                    <td class="p-3">
                                        <input type="number" disabled name="kuantitas[]" min="1" value="{{ $p->kuantitas }}" class="w-20 p-2 rounded-lg border-gray-300 focus:ring-blue-500 shadow-sm">
                                    </td>
                                    <td class="p-3">
                                        <span class="text-gray-800">Rp.{{ number_format($p->subtotal) }}</span>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                            {{-- @foreach ($p->details as $item) --}}

                            {{-- @endforeach --}}
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-10">
                <label for="jumlah_bayar" class="block text-gray-800 font-medium mb-1">Detail Transaksi :</label>
                <div class="flex ">
                    <span class="block text-gray-500 font-small mb-1">Total Transaksi : &nbsp;</span> <span class="block text-gray-800 font-small mb-1">Rp. {{ number_format($transaksi->total_harga) }}</span>
                </div>
                <div class="flex ">
                    <span class="block text-gray-500 font-small mb-1">Jumlah uang &ensp; : &nbsp;</span> <span class="block text-gray-800 font-small mb-1">Rp. {{ number_format($transaksi->jumlah_bayar) }}</span>
                </div>
                <div class="flex ">
                    <span class="block text-gray-500 font-small mb-1">Kembalian &emsp; &nbsp; : &nbsp;</span> <span class="block text-gray-800 font-small mb-1">Rp. {{ number_format($transaksi->kembalian) }}</span>
                </div>
                {{-- <input type="number" name="jumlah_bayar" required class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm"> --}}
            </div>

            <div class="text-right pt-10">
                <a href="{{ url('transaksi/'.$transaksi->id.'/delete') }}" class="inline-flex items-center px-6 mx-1 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Delete Transaksi
                </a>
                <a href="{{ url('transaksi/'.$transaksi->id.'/edit') }}" class="inline-flex items-center px-6 mx-1 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>

                    Edit Transaksi
                </a>
                <a href="{{ route('transaksi.index') }}" type="submit" class="inline-flex items-center px-6 mx-1 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Confirm Transaksi
                </a>
                <a href="" type="submit" class="inline-flex items-center px-6 mx-1 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                    </svg>

                    Confirm & Cetak
                </a>
            </div>
        {{-- </form> --}}
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-3 h-3 bg-blue-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-48 right-20 w-2 h-2 bg-indigo-400 rounded-full animate-float-delayed opacity-40"></div>
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
<script>
    document.getElementById('transaksi-form').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('input[name="produk_id[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault();
            alert('Pilih minimal satu produk untuk transaksi.');
        }
    });
    function count() {
        const rows = document.querySelectorAll('tbody tr');
        let totalAll = 0;

        rows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            const quantityInput = row.querySelector('input[name="kuantitas[]"]');
            const totalCell = row.querySelector('td:nth-child(3) span');

            // Ambil harga dari teks (misal: "Produk 2 (Rp10)")
            const labelText = row.querySelector('label span').textContent;
            const hargaMatch = labelText.match(/Rp\s?([\d,.]+)/);
            const harga = hargaMatch ? parseInt(hargaMatch[1].replace(/[^0-9]/g, '')) : 0;

            const qty = parseInt(quantityInput.value) || 1;

            if (checkbox.checked) {
                const total = harga * qty;
                totalCell.textContent = `Rp${total.toLocaleString()}`;
                totalAll += total;
            } else {
                totalCell.textContent = 'Rp0';
            }
        });

        document.getElementById('totalALL').textContent = `Rp${totalAll.toLocaleString()}`;
    }

    // Tambahkan event listener ke semua checkbox dan input
    document.querySelectorAll('input[type="checkbox"], input[name="kuantitas[]"]').forEach(el => {
        el.addEventListener('change', count);
    });

    // Validasi kuantitas minimal 1 dan hitung ulang saat diinput
    document.querySelectorAll('input[name="kuantitas[]"]').forEach(input => {
        input.addEventListener('input', function () {
            if (this.value < 1) this.value = 1;
            count();
        });
    });
    docuemt.querySelectorAll('#input').forEach(input => {
        input.addEventListener('input', function() {
            if (this.value < 1) {
                this.value = 1;
            }
        });
    });
</script>
@endsection
