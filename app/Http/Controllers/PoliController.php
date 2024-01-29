<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        return view('poli.index', compact('polis'));
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
            'dokter' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

        Poli::create($request->all());

        return redirect()->route('poli.index')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function show(Poli $poli)
    {
        return view('poli.show', compact('poli'));
    }

    public function edit(Poli $poli)
    {
        return view('poli.edit', compact('poli'));
    }

    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'nama_poli' => 'required',
            'dokter' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

        $poli->update($request->all());

        return redirect()->route('poli.index')->with('success', 'Poli berhasil diperbarui.');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();

        return redirect()->route('poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}
