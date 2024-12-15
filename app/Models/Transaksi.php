<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_pelanggan',
        'jumlah',
        'id_produk',
        'harga_total',
        'status',
        'bukti_tf',
        'tanggal_transaksi'
    ];

    // Relasi ke pelanggan
}