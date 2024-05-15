<!-- resources/views/rekam_medik/create.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Tambah Rekam Medik')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Tambah Rekam Medik</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Terdapat masalah pada input data.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rekam-medik.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="pasien">Pasiens:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="pasien" readonly ">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPasien">Pasien</button>
                        </div>
                    </div>
                    @error('pasien_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <input type="hidden" class="form-control" id="pasien_id" name="pasien_id">
                <input type="hidden" class="form-control" id="umur" name="umur" >

                <div class="form-group">
                    <label for="poli_id">Poli:</label>
                    <select class="form-control" id="poli_id" name="poli_id" >
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
                    <label for="penyakit_id">Penyakit:</label>
                    <select class="form-control" id="penyakit_id" name="penyakit_id" >
                        <option value="" disabled selected>Pilih Penyakit</option>
                      
                    </select>
                    @error('penyakit_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keluhan:</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" >{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('rekam-medik.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

<!-- resources/views/rekam_medik/create.blade.php -->
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

