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
            'Judul' => $row['judul'],
            'Genre' => $row['genre'],
            'Pengarang' => $row['pengarang'],
            'Penerbit' => $row['penerbit'],
            'Tanggal_Terbit' => $row['tanggal_terbit'],
            'Toko_Distributor' => $row['toko_distributor'],
            'Jumlah_Buku' => $row['jumlah_buku'],
        ]);
    }
}
