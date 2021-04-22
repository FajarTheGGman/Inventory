<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExcel implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Inventory::all();
    }

    public function headings(): array{
        return [
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
    }
}
