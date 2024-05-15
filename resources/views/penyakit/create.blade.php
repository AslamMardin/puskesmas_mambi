<!-- resources/views/pasien/create.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Tambah Data Penyakit')
    
@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form action="{{ route('penyakit.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="poli_id">Poli:</label>
        <select class="form-control" id="poli_id" name="poli_id" required>
            <option value="" disabled selected>Pilih Poli</option>
            @foreach($polis as $poli)
                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
            @endforeach
        </select>
        @error('poli_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="nama_penyakit">Nama:</label>
        <input type="text" name="nama_penyakit" class="form-control @error('nama_penyakit') is-invalid @enderror" value="{{ old('nama_penyakit') }}">
        @error('nama_penyakit')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan :</label>
        <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
        @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
