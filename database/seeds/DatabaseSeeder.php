<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'adminacc@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users_information')->insert([
            'users_id' => 1,
            'name' => 'admin',
            'alamat' => 'admin',
            'gender' => 'Male',
            'date_of_birth' => 'admin',
            'place_of_birth' => 'admin',
            'nik' => 'admin',
            'tanggal_bergabung' => 'admin',
            'tanggal_lulus_probation' => 'admin',
            'department' => 'IT',
            'jabatan' => 'admin',
            'role' => 'Director',
        ]);
    }
}
