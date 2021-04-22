<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $fillable = [
        'id',
        'pengelola',
        'tempat',
        'kelompok_aset',
        'jenis',
        'nama',
        'jumlah',
        'kondisi',
        'kode',
        'merk',
        'harga',
        'tahun_pembelian',
        'sumber_dana',
        'keterangan',
        'waktu_di_tambahkan'
    ];
    public $timestamps = false;
}
