@extends('layouts.admin.main')

@section('title', 'Data Pasien')

@section('content')
@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="card">

    <div class="card-header">
      <h4>Pasien</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

      <div class="my-2">
        <a href="{{ route('pasien.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah</a>
      </div>
      <table class="table table-hover"  id="table-pasien">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>#</th>
           
          </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jk }}</td>
                <td>{{ $p->umur }}</td>
                <td>
                    <a href="{{ route('pasien.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="form-delete-{{ $p->id }}" action="{{ route('pasien.destroy', $p->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapus({{ $p->id }})">Hapus</button>
                  </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
      
    </div>
  </div>
@endsection

@push('styles')
    <style>
      /* Tambahkan ini ke dalam file CSS Anda atau dalam tag style di halaman Anda */
.dataTables_wrapper .dataTables_paginate {
    float: right;
    margin: 10px 0;
}
      </style>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
            $('#table-pasien').DataTable({
              "bInfo": false, // Menonaktifkan pesan informasi
              "lengthMenu": [10, 25, 50],
              "pagingType": "full_numbers", // Opsi untuk menentukan jenis pagination
        "language": {
            "paginate": {
                "previous": "&laquo;",
                "next": "&raquo;",
            }
        },
            });
        });

  function konfirmasiHapus(id) {
      Swal.fire({
          title: 'Anda yakin?',
          text: "Data pasien akan dihapus secara permanen!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
                    // Kirim form ketika pengguna klik "Ya"
                    document.getElementById('form-delete-' + id).submit();
                }
      });
  }
</script>
@endpush