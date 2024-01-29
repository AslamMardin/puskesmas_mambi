<!-- resources/views/pasien/create.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Tambah Poli')
    
@section('content')

<form action="{{ route('poli.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nama_poli">Nama:</label>
        <input type="text" name="nama_poli" class="form-control @error('nama_poli') is-invalid @enderror" value="{{ old('nama_poli') }}">
        @error('nama_poli')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
