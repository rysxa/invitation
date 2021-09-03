<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'slug'              => Str::slug('indry'),
            'name'              => 'Indry Sefviana',
            'email'             => 'indrysfa@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password'          => Hash::make(12345678),
            'role_id'           => 1
        ]);

        DB::table('users')->insert([
            'slug'              => Str::slug('rara'),
            'name'              => 'Rara',
            'email'             => 'rara@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password'          => Hash::make(12345678),
            'role_id'           => 2
        ]);
    }
}
