<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Poli;
use App\Models\RekamMedik;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function filterBulan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = date('Y'); // Ambil tahun saat ini, bisa disesuaikan sesuai kebutuhan

        // Gabungkan bulan dan tahun untuk membuat tanggal awal bulan
        $tanggalAwalBulan = "$tahun-$bulan-01";

        // Simpan tanggal awal bulan ke dalam tabel settings
        $setting = Setting::firstOrNew();
        $setting->currentMonth = $tanggalAwalBulan;
        $setting->save();

        // Simpan nilai bulan dalam session
        Session::put('selectedMonth', $bulan);
        return redirect()->route('admin.laporan');
        // ... Sisanya dari logika filter yang Anda perlukan ...
    }
    public function welcome()
    {
        return view('admin.welcome');
    }
    public function dashboard()
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

        // Set lokal ke bahasa Indonesia
        Carbon::setLocale('id');

        // Format tanggal dengan hari, tanggal, bulan, dan tahun dalam bahasa Indonesia
        $tanggalSekarang = Carbon::now()->isoFormat('dddd, DD MMMM YYYY');
        return view('admin.dashboard', compact('data', 'uniquePenyakit', 'jumlahPasienPerPenyakit', 'tanggalSekarang'));
    }

    public function laporan()
    {
        $setting = Setting::first();
        $rekamMediks = RekamMedik::with(['pasien', 'poli', 'penyakit'])
            ->whereMonth('created_at', Carbon::parse($setting->currentMonth)->month)
            ->take(10)
            ->get();
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
        // dd($jumlahPasienPerPenyakit);
        $data = [];
        foreach ($uniquePenyakit as $item) {
            $namaPenyakit = $item->penyakit->nama_penyakit;

            // Pastikan penyakit ada di kedua array sebelum menambahkannya ke $data
            if (array_key_exists($namaPenyakit, $jumlahPasienPerPenyakit)) {
                $data['penyakit'][] = $namaPenyakit;
                $data['pengidap'][] = $jumlahPasienPerPenyakit[$namaPenyakit];
                $data['detail'][] = $this->mencariJk($namaPenyakit);
            }
        }

        // dd($data);

        return view('admin.laporan_bulan', compact('data', 'uniquePenyakit', 'jumlahPasienPerPenyakit'));
    }

    public function mencariJk($penyakit)
    {
        $rekamMedik = RekamMedik::whereHas('penyakit', function ($query) use ($penyakit) {
            $query->where('nama_penyakit', $penyakit);
        })->with('pasien')->get();
        $title = 'Penyakit ' . $penyakit;

        $lk = [];
        $pr = [];
        $umurPasien = [];
        foreach ($rekamMedik as $key => $item) {
            # code...
            if ($item->pasien->jk == "Laki-laki") {
                array_push($lk, $item->pasien->umur);
            }

            if ($item->pasien->jk == "Perempuan") {
                array_push($pr, $item->pasien->umur);
            }

            array_push($umurPasien, $item->pasien->umur);

        };

        $result = [
            'umur_minimum' => min($umurPasien),
            'umur_maksimum' => max($umurPasien),
            'jumlahLaki' => count($lk),
            'jumlahPerempuan' => count($pr),
        ];
        return $result;
    }
}
