<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::orderByDesc('id')->get();
        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'ttl' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.show', compact('pasien'));
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'ttl' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
    }
}
