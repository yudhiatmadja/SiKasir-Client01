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
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Transaksi Penjualan</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('transaksi/'.$transaksi->id) }}" class="space-y-6">
            @csrf

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-200 rounded-lg shadow-sm">
                    <thead class="bg-white/60 backdrop-blur border-b border-gray-300">
                        <tr>
                            <th class="text-left p-3 font-semibold text-gray-800">Produk</th>
                            <th class="text-left p-3 font-semibold text-gray-800">Kuantitas</th>
                            <th class="text-left p-3 font-semibold text-gray-800">Total</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-white/60 backdrop-blur border-b border-gray-300">
                        <tr>
                            <th colspan="2" class="text-right p-3 font-semibold text-gray-800">Total</th>
                            <th colspan="2" class="text-left p-3 font-semibold text-gray-800" id="totalALL">{{ $transaksi->total_harga }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($produks as $p)
                        <tr class="hover:bg-white/40 transition">
                            <td class="p-3">
                                <label class="inline-flex items-center space-x-2">
                                    <input type="checkbox" name="produk_id[]" value="{{ $p->id }}" @checked($transaksi->details->pluck('produk')->pluck('id')->contains($p->id)) class="rounded border-gray-300 focus:ring-blue-500" onchange="count()">
                                    <span>{{ $p->nama }} <span class="text-sm text-gray-500">(Rp{{ number_format($p->harga) }})</span></span>
                                </label>
                            </td>
                            <td class="p-3">
                                <input type="number" name="kuantitas[]" min="1" value="{{ $transaksi->details->firstWhere('produk_id', $p->id)?$transaksi->details->firstWhere('produk_id', $p->id)->kuantitas : 1 }}" class="w-20 p-2 rounded-lg border-gray-300 focus:ring-blue-500 shadow-sm" onchange="count()">
                            </td>
                            <td class="p-3">
                                <span class="text-gray-800">Rp. {{ number_format($transaksi->details->firstWhere('produk_id', $p->id)?$transaksi->details->firstWhere('produk_id', $p->id)->subtotal:0) }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <label for="jumlah_bayar" class="block text-gray-800 font-medium mb-1">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" required class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 shadow-sm" value="{{ number_format($transaksi->jumlah_bayar) }}" >
            </div>

            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Transaksi
                </button>
            </div>
        </form>
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
