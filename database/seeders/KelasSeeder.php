<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vl_kelas')->insert([
            [
                'kelas' => '9 A'
            ],
            [
                'kelas' => '9 B'
            ],
            [
                'kelas' => '9 C'
            ],
        ]);
    }
}
