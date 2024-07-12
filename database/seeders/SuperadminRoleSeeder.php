<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superadmin2',
            'email' => 'superadmin2@mail.com',
            'username' => 'superadmin2',
            'role' => 'superadmin',
            'password' => Hash::make('superadmin123'),
            'remember_token' => Str::random(60)
        ]);
    }
}
