<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'Judul' => 'Eca yang bersamaku 2024',
            'Genre' => 'romansa',
            'Pengarang' => 'davi',
            'Penerbit' => 'DAR',
            'Tanggal_Terbit' => '2024-01-20',
            'Toko_Distributor' => 'Gramedia',
            'Jumlah_Buku' => '23'
        ]);
    }
}
