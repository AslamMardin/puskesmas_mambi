<!-- resources/views/pasien/edit.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Edit Data Rekam Medis Pasien')
    
@section('content')

<form action="{{ route('rekam-medik.update', $rekamMedik->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="pasien">Pasien:</label>
        <div class="input-group">
            <input type="text" class="form-control" id="pasien" value="{{old('keterangan', $rekamMedik->pasien->nama)}}" readonly ">
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPasien">Tambah</button>
            </div>
        </div>
        @error('pasien_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <input type="hidden" class="form-control" id="pasien_id" name="pasien_id" value="{{old('keterangan', $rekamMedik->pasien->id)}}" readonly>
    <input type="hidden" class="form-control" id="umur" name="umur" value="{{old('keterangan', $rekamMedik->pasien->umur)}}" readonly>


    <div class="form-group">
        <label for="poli_id">Poli:</label>
        <select class="form-control" id="poli_id" name="poli_id">
            <option value="" disabled selected>Pilih Poli</option>
            @foreach($polis as $poli)
                <option value="{{ $poli->id }}" {{ $poli->id == $rekamMedik->poli_id ? 'selected' : '' }}>
                    {{ $poli->nama_poli }}
                </option>
            @endforeach
        </select>
        @error('poli_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="penyakit_id">Penyakit:</label>
        <select class="form-control" id="penyakit_id" name="penyakit_id">
            <option value="" disabled selected>Pilih Penyakit</option>
            @foreach($penyakits as $penyakit)
                <option value="{{ $penyakit->id }}" {{ $penyakit->id == $rekamMedik->penyakit_id ? 'selected' : '' }}>
                    {{ $penyakit->nama_penyakit }}
                </option>
            @endforeach
        </select>
        @error('penyakit_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    

    <div class="form-group">
        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" >{{ old('keterangan', $rekamMedik->keterangan) }}</textarea>
        @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#poli_id').change(function () {
            var poliId = $(this).val();

            if (poliId) {
                $.ajax({
                    type: "GET",
                    url: '/get-penyakit/' + poliId,
                    success: function (data) {
                       $('#penyakit_id').empty()
                        $('#penyakit_id').append('<option value="" disabled selected>Pilih Penyakit</option>');
                        $.each(data, function (key, value) {
                            $('#penyakit_id').append('<option value="' + value.id + '">' + value.nama_penyakit + '</option>');
                        });
                    }
                });
            } else {
                $('#penyakit_id').empty();
            }
        });


        $('#modalPasien').on('show.bs.modal', function () {
            $.ajax({
                type: "GET",
                url: '/get-daftar-pasien', // Sesuaikan dengan route yang Anda buat
                success: function (data) {
                    $('.modal-body').html(data);
                }
            });
        });


        // Tangkap hasil pencarian pasien
        $(document).on('submit', '#formCariPasien', function (e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '/cari-pasien', // Sesuaikan dengan route yang Anda buat
                data: $(this).serialize(),
                success: function (data) {
                    $('.modal-body').html(data);
                }
            });
        });

        // Tangkap klik pada hasil pencarian dan isi input dengan nama pasien yang dipilih
        $(document).on('click', '.pilihPasien', function () {
            var namaPasien = $(this).data('nama');
            $('#pasien').val(namaPasien);
            $('#umur').val($(this).data('umur'));
            $('#pasien_id').val($(this).data('id'));
            $('#modalPasien').modal('hide');
        });
    });
</script>
@endpush
