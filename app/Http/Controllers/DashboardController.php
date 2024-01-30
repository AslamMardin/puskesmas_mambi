<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Poli;
use App\Models\RekamMedik;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function welcome()
    {
        return view('admin.welcome');
    }
    public function dashboard()
    {

        $rekamMediks = RekamMedik::with(['pasien', 'poli', 'penyakit'])->get();
        $jumlahPasien = Pasien::count();
        $jumlahPoli = Poli::count();
        $jumlahPenyakit = Penyakit::count();

        $data = [
            'rekamMedik' => $rekamMediks->count(),
            'jumlahPasien' => $jumlahPasien,
            'jumlahPoli' => $jumlahPoli,
            'jumlahPenyakit' => $jumlahPenyakit,
        ];

        // Menyaring data agar nama penyakit tidak berulang
        $uniquePenyakit = $rekamMediks->unique('penyakit.nama_penyakit');

        // Menghitung jumlah pasien untuk setiap penyakit
        $jumlahPasienPerPenyakit = [];
        foreach ($uniquePenyakit as $rekamMedik) {
            $penyakit = $rekamMedik->penyakit->nama_penyakit;
            $jumlahPasien = RekamMedik::whereHas('penyakit', function ($query) use ($penyakit) {
                $query->where('nama_penyakit', $penyakit);
            })->count();

            $jumlahPasienPerPenyakit[$penyakit] = $jumlahPasien;
        }

        // Set lokal ke bahasa Indonesia
        Carbon::setLocale('id');

        // Format tanggal dengan hari, tanggal, bulan, dan tahun dalam bahasa Indonesia
        $tanggalSekarang = Carbon::now()->isoFormat('dddd, DD MMMM YYYY');
        return view('admin.dashboard', compact('data', 'uniquePenyakit', 'jumlahPasienPerPenyakit', 'tanggalSekarang'));
    }
}
