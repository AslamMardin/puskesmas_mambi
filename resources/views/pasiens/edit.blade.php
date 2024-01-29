<!-- resources/views/pasien/create.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Edit Pasien')
    
@section('content')
<form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pasien->nama) }}" required>
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="jk">Jenis Kelamin:</label>
        <select name="jk" class="form-control @error('jk') is-invalid @enderror" required>
            <option value="Laki-laki" {{ old('jk', $pasien->jk) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jk', $pasien->jk) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jk')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="ttl">Tanggal Lahir:</label>
        <input type="date" name="ttl" class="form-control @error('ttl') is-invalid @enderror" value="{{ old('ttl', $pasien->ttl) }}" required>
        @error('ttl')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $pasien->no_hp) }}" required>
        @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $pasien->alamat) }}</textarea>
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
