<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Poli;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
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
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

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
