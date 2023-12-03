<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'L QUEENLY', 'L MTH AKSESORIS (IM)', 'L MTH TABUNG (LK)',
            'SP MTH SPAREPART (LK)', 'CI MTH TINTA LAIN (IM)',
            'L MTH AKSESORIS (LK)', 'S MTH STEMPEL (IM)'
        ];

        foreach ($datas as $data) {
            DB::table('kategori')->insert([
                'nama_kategori' => $data
            ]);
        }
    }
}
