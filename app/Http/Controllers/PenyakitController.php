<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Poli;
use App\Models\RekamMedik;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function getViewPenyakit($penyakit)
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
        return view('rekam_medik.show', compact('title', 'rekamMedik', 'result'));
    }
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('penyakit.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => 'required',
            'nama_penyakit' => 'required',
            'keterangan' => 'required'
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

         // Memeriksa apakah nama penyakit sudah ada sebelumnya
    if (Penyakit::where('nama_penyakit', $request->nama_penyakit)->exists()) {
        return redirect()->route('penyakit.create')->withInput()->with('error', 'Nama penyakit sudah ada dalam database.');
    }

        Penyakit::create($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function show(Penyakit $penyakit)
    {
        return view('penyakit.show', compact('penyakit'));
    }

    public function edit(Penyakit $penyakit)
    {
        $polis = Poli::all();
        return view('penyakit.edit', compact('penyakit', 'polis'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'poli_id' => 'required',
            'nama_penyakit' => 'required',
            'keterangan' => 'required'
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

        $penyakit->update($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil dihapus.');
    }
}
