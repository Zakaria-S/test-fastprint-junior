<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ['tidak bisa dijual', 'bisa dijual'];
        foreach ($datas as $data) {
            DB::table('status')->insert([
                'nama_status' => $data
            ]);
        }
    }
}
