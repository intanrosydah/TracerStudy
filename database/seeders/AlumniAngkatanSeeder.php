<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniAngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vl_alumni_angkatan')->insert([
            [
                'tahun_angkatan' => '2021'
            ],
            [
                'tahun_angkatan' => '2020'
            ],
            [
                'tahun_angkatan' => '2019'
            ],
        ]);
    }
}
