<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['BK01', 'Belajar Matematika',   'Ragsi Taraka',  10, 'Pelajaran'],
            ['BK02', 'Laravel untuk Pemula', 'Anis Mima',     20, 'Pelajaran'],
            ['BK03', 'Laskar Pelangi',       'Andrea Hirata',  8, 'Novel'],
            ['BK04', 'Kado Terbaik',         'J.S. Khairen',  10, 'Novel'],
        ];

        foreach ($data as [$kode, $judul, $penulis, $stok, $kategori]) {
            Buku::firstOrCreate(
                ['kode_buku' => $kode],
                ['judul' => $judul, 'penulis' => $penulis, 'stok' => $stok, 'kategori' => $kategori]
            );
        }
    }
}