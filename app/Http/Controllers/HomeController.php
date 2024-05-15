<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Poli;
use App\Models\RekamMedik;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $rekamMediks = RekamMedik::with(['pasien', 'poli', 'penyakit'])->take(10)->get();
        $jumlahPasien = Pasien::count();
        $jumlahPoli = Poli::count();
        $jumlahPenyakit = Penyakit::count();
        $jumlahRekam = RekamMedik::count();
        $data = [
            'rekamMedik' => $jumlahRekam,
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

        $uniquePenyakitSorted = $uniquePenyakit->sortByDesc(function ($penyakit) use ($jumlahPasienPerPenyakit) {
            return $jumlahPasienPerPenyakit[$penyakit->penyakit->nama_penyakit];
        });

        // Set lokal ke bahasa Indonesia
        Carbon::setLocale('id');

        // Format tanggal dengan hari, tanggal, bulan, dan tahun dalam bahasa Indonesia
        $tanggalSekarang = Carbon::now()->isoFormat('dddd, DD MMMM YYYY');
        return view('home',  compact('data','uniquePenyakitSorted', 'uniquePenyakit', 'jumlahPasienPerPenyakit', 'tanggalSekarang'));
    }
}
