<!-- resources/views/pasien/edit.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Edit Penyakit')
    
@section('content')

<form action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="poli_id">Poli:</label>
        <select class="form-control" id="poli_id" name="poli_id" required>
            <option value="" disabled>Pilih Poli</option>
            @foreach($polis as $poli)
                <option value="{{ $poli->id }}" {{ $penyakit->poli_id == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli }}</option>
            @endforeach
        </select>
        @error('poli_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="nama_penyakit">Nama:</label>
        <input type="text" name="nama_penyakit" class="form-control @error('nama_penyakit') is-invalid @enderror" value="{{ old('nama_penyakit', $penyakit->nama_penyakit) }}">
        @error('nama_penyakit')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="keterangan">Alias :</label>
        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan', $penyakit->keterangan) }}">
        @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
