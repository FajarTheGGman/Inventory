<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;

class InventoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'id' => $row[0],
            'pengelola' => $row[1],
            'tempat' => $row[2],
            'kategori' => $row[3],
            'barang' => $row[4],
            'jumlah' => $row[5],
            'baik' => $row[6],
            'rusak' => $row[7],
            'waktu_di_tambahkan' => $row[8]
        ]);
    }
}
