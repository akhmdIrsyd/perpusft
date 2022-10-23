<?php

namespace App\Imports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
class BukuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
        return new Buku([
            //
            "nama_buku" => $row['nama_buku'],
            "penulis" => $row['penulis'],
            "penerbit" => $row['penerbit'],
            "harga" => $row['harga'],
            "exemplar" => $row['exemplar'],
            "jumlah" => 0,
            "id_jurusan" => $row['id_jurusan'],
        ]);
    }
}
