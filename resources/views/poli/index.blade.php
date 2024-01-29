@extends('layouts.admin.main')

@section('title', 'Data Poli')

@section('content')
<div class="card">

    <div class="card-header">
      <h4>Poli Puskesmas</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

      <div class="my-2">
        <a href="{{ route('poli.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah</a>
      </div>
      <table class="table table-hover"  id="table-pasien">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Poli</th>
          
            <th>#</th>
           
          </tr>
        </thead>
        <tbody>
            @foreach($polis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_poli }}</td>
               
                <td>
                    <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="form-delete-{{ $item->id }}" action="{{ route('poli.destroy', $item->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapus({{ $item->id }})">Hapus</button>
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