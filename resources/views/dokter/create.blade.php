<!-- resources/views/pasien/create.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Tambah Dokter')
    
@section('content')
<form action="{{ route('dokter.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_dokter">Nama:</label>
        <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter') }}" >
        @error('nama_dokter')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan:</label>
        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" >
        @error('jabatan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="no_hp_dokter">Nomor HP:</label>
        <input type="text" class="form-control @error('no_hp_dokter') is-invalid @enderror" id="no_hp_dokter" name="no_hp_dokter" value="{{ old('no_hp_dokter') }}" >
        @error('no_hp_dokter')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
