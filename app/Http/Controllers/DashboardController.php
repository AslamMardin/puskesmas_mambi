<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function welcome()
    {
        return view('admin.welcome');
    }
    public function dashboard()
    {

        $rekamMediks = RekamMedik::with(['pasien', 'poli', 'penyakit'])->get();

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

        // Menghitung jumlah pasien untuk setiap jenis kelamin
        $jumlahPasienPerJenisKelamin = [];
        foreach ($uniquePenyakit as $rekamMedik) {
            $jenisKelamin = $rekamMedik->pasien->jk;
            $jumlahPasien = RekamMedik::whereHas('pasien', function ($query) use ($jenisKelamin) {
                $query->where('jk', $jenisKelamin);
            })->count();

            $jumlahPasienPerJenisKelamin[$jenisKelamin] = $jumlahPasien;
        }

        $jumlahLakiLaki = RekamMedik::whereHas('pasien', function ($query) {
            $query->where('jk', 'Laki-laki');
        })->select('penyakit_id', DB::raw('COUNT(*) as total'))
            ->groupBy('penyakit_id')
            ->get();

        // Output jumlah penderita laki-laki per penyakit

        // Dalam metode controller Anda
        $jumlahPerempuan = RekamMedik::whereHas('pasien', function ($query) {
            $query->where('jk', 'Perempuan');
        })->select('penyakit_id', DB::raw('COUNT(*) as total'))
            ->groupBy('penyakit_id')
            ->get();

        return view('admin.dashboard', compact('uniquePenyakit', 'jumlahPasienPerPenyakit', 'jumlahPasienPerJenisKelamin', 'jumlahLakiLaki', 'jumlahPerempuan'));
    }
}
