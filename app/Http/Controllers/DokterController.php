<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'jabatan' => 'required',
            'no_hp_dokter' => 'required',
        ],  [
            'required' => 'Kolom :attribute wajib diisi.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'date' => 'Kolom :attribute harus berupa tanggal.',
    ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function show(Dokter $dokter)
    {
        return view('dokter.show', compact('dokter'));
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'jabatan' => 'required',
            'no_hp_dokter' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'date' => 'Kolom :attribute harus berupa tanggal.',
    ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
