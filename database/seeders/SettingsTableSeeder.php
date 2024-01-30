<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ganti dengan nilai bulan dan tahun yang diinginkan

        $bulan = 1; // misalnya, Januari
        $tahun = Carbon::now()->year; // menggunakan Carbon untuk mendapatkan tahun saat ini

        $tanggalAwalBulan = "$tahun-" . str_pad($bulan, 2, '0', STR_PAD_LEFT) . "-01";

        Setting::updateOrInsert(
            ['id' => 1], // Sesuaikan dengan id setting yang sesuai
            ['currentMonth' => $tanggalAwalBulan]
        );
    }
}
