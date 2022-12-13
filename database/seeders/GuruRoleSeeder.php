<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'guru2',
            'username' => 'guru2',
            'email' => 'guru2@mail.com',
            'role' => 'guru',
            'password' => Hash::make('guru123'),
            'remember_token' => Str::random(60)
        ]);
    }
}
