<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        \App\Models\Pasien::factory(5)->create();
        \App\Models\Poli::factory(3)->create();
        // \App\Models\Dokter::factory(10)->create();
        // \App\Models\Penyakit::factory(20)->create();
        // \App\Models\RekamMedik::factory(50)->create();

        $this->call(SettingsTableSeeder::class);
    }
}
