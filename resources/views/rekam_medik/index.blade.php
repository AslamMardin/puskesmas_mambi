<!-- resources/views/rekam_medik/index.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Data Rekam Medik')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Data Rekam Medik</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="my-2">
                <a href="{{ route('rekam-medik.create') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah</a>
            </div>

            <table class="table" id="table-rekam-medik">
                <thead>
                <tr>
                    <th>NO RM</th>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>JK</th>
                    <th>Penyakit</th>
                    <th width="150">Keluhan</th>
                    <th>Suhu</th>
                    <th>Tekanan</th>
                    <th>Nadi</th>
                    <th>Pernapasan</th>
                    <th>TB</th>
                    <th>BB</th>
                    <th>Terapi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rekamMediks as $rekamMedik)
                    <tr>
                        <td>{{ $rekamMedik->no_rm }}</td>
                        <td>{{ $rekamMedik->tanggal_pemeriksaan }}</td>
                        <td>{{ $rekamMedik->pasien->nama }}</td>
                        <td>
                            @if($rekamMedik->pasien->jk == 'Laki-laki')
                            L
                        @elseif($rekamMedik->pasien->jk == 'Perempuan')
                            P
                        @endif
                    </td>
                        <td>{{ $rekamMedik->penyakit->nama_penyakit }}</td>
                        <td>{{ $rekamMedik->keterangan }}</td>
                        <td>{{ $rekamMedik->suhu }}</td>
                        <td>{{ $rekamMedik->TD }}</td>
                        <td>{{ $rekamMedik->nadi }}</td>
                        <td>{{ $rekamMedik->pernapasan }}</td>
                        <td>{{ $rekamMedik->tb }}</td>
                        <td>{{ $rekamMedik->bb }}</td>
                        <td>{{ $rekamMedik->terapi }}</td>
                        <td>
                            <a href="{{ route('rekam-medik.edit', $rekamMedik->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <form id="form-delete-{{ $rekamMedik->id }}" action="{{ route('rekam-medik.destroy', $rekamMedik->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasiHapus({{ $rekamMedik->id }})"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                  
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table-rekam-medik').DataTable({
                "bInfo": false,
                "lengthMenu": [10, 25, 50],
                "pagingType": "full_numbers",
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
                text: "Data rekam medik akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        }
    </script>
@endpush
