<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vl_status_pernikahan')->insert([
            [
                'status_pernikahan' => 'Menikah'
            ],
            [
                'status_pernikahan' => 'Belum Menikah'
            ],
            [
                'status_pernikahan' => 'Pernah Menikah'
            ],
        ]);
    }
}
