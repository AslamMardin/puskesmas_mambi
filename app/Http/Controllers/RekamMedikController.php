<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Poli;
use App\Models\RekamMedik;
use Illuminate\Http\Request;

class RekamMedikController extends Controller
{

    public function getDaftarPasien()
    {
        $pasiens = Pasien::all();
        return view('rekam_medik.daftar_pasien', compact('pasiens'));
    }

    public function cariPasien(Request $request)
    {
        $keyword = $request->keyword;
        $pasiens = Pasien::where('nama', 'LIKE', "%$keyword%")->get();
        return view('rekam_medik.daftar_pasien', compact('pasiens'));
    }

    public function getPenyakit($poliId)
    {
        $penyakits = Penyakit::where('poli_id', $poliId)->get();
        return response()->json($penyakits);
    }
    public function index()
    {
        $rekamMediks = RekamMedik::with(['dokter', 'penyakit', 'pasien'])->get();
        return view('rekam_medik.index', compact('rekamMediks'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        $polis = Poli::all();

        return view('rekam_medik.create', compact('pasiens', 'dokters', 'polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'poli_id' => 'required',
            'penyakit_id' => 'required',
            'keterangan' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
        ]);

        $request['tanggal_pemeriksaan'] = now();

        RekamMedik::create($request->all());

        return redirect()->route('rekam-medik.index')->with('success', 'Rekam medik berhasil ditambahkan.');
    }

    public function show(RekamMedik $rekamMedik)
    {
        return view('rekam_medik.show', compact('rekamMedik'));
    }

    public function edit(RekamMedik $rekamMedik)
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        $polis = Poli::all();
        $penyakits = Penyakit::all();
        return view('rekam_medik.edit', compact('rekamMedik', 'pasiens', 'dokters', 'polis', 'penyakits'));
    }

    public function update(Request $request, RekamMedik $rekamMedik)
    {
        $request->validate([

            'keterangan' => 'required',
        ]);

        $rekamMedik->update([
            'pasien_id' => $request->get('pasien_id'),
            'dokter_id' => $request->get('dokter_id'),
            'poli_id' => $request->get('poli_id'),
            'penyakit_id' => $request->get('penyakit_id'),
            'keterangan' => $request->get('keterangan'),
        ]);

        return redirect()->route('rekam-medik.index')->with('success', 'Rekam medik berhasil diperbarui.');
    }

    public function destroy(RekamMedik $rekamMedik)
    {
        $rekamMedik->delete();

        return redirect()->route('rekam-medik.index')->with('success', 'Rekam medik berhasil dihapus.');
    }

}
