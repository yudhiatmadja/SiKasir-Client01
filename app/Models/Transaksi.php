<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_harga',
        'jumlah_bayar',
        'kembalian',
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
        'jumlah_bayar' => 'decimal:2',
        'kembalian' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke DetailTransaksi
    public function details()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    // Accessor untuk format mata uang
    public function getTotalHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    public function getJumlahBayarFormattedAttribute()
    {
        return 'Rp ' . number_format($this->jumlah_bayar, 0, ',', '.');
    }

    public function getKembalianFormattedAttribute()
    {
        return 'Rp ' . number_format($this->kembalian, 0, ',', '.');
    }
}
