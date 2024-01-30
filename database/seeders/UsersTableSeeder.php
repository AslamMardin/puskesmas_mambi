<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // Tambahkan pengguna awal
        DB::table('users')->insert([
            'name' => 'wiwik',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // Sesuaikan dengan password yang diinginkan
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
