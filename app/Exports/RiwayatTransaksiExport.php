<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RiwayatTransaksiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::with('user')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Admin',
            'Total Harga Transaksi',
            'Jumlah Bayar',
            'Kembalian',
            'Tanggal Transaksi', // dari relasi user
        ];
    }

    public function map($transaksi): array
    {
        return [
            optional($transaksi->user)->name, // relasi 'user'
            $transaksi->total_harga,
            $transaksi->jumlah_bayar,
            $transaksi->kembalian,
            $transaksi->created_at->format('d-m-Y'), // format tanggal
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Baris 1 adalah heading
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4F81BD'], // biru elegan
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

}
