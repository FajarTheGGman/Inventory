<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'id' => $row['id'],
            'pengelola' => $row['pengelola'],
            'tempat' => $row['tempat'],
            'kelompok_aset' => $row['kelompok_aset'],
            'jenis' => $row['jenis'],
            'nama' => $row['nama'],
            'jumlah' => $row['jumlah'],
            'kondisi' => $row['kondisi'],
            'kode' => $row['kode'],
            'merk' => $row['merk'],
            'harga' => $row['harga'],
            'tahun_pembelian' => $row['tahun_pembelian'],
            'sumber_dana' => $row['sumber_dana'],
            'keterangan' => $row['keterangan'],
            'waktu_di_tambahkan' => $row['waktu_di_tambahkan']
         ]);
    }
}
