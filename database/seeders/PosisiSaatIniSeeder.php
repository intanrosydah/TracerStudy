<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosisiSaatIniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vl_posisi_saat_ini')->insert([
            [
                'posisi' => 'Bekerja'
            ],
            [
                'posisi' => 'Belum Bekerja'
            ],
            [
                'posisi' => 'Mahasiswa'
            ],
        ]);
    }
}
