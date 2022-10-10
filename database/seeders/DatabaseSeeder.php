<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperadminRoleSeeder::class);
        $this->call(StatusPernikahanSeeder::class);
        $this->call(AlumniAngkatanSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(PosisiSaatIniSeeder::class);
    }
}
