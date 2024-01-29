<form id="formCariPasien">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari pasien..." name="keyword" required>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<!-- resources/views/rekam_medik/daftar_pasien.blade.php -->
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->jk }}</td>
                <td>{{ $pasien->umur }}</td>
                <td>
                    <button type="button" class="btn btn-light pilihPasien" data-nama="{{ $pasien->nama }}" data-umur="{{ $pasien->umur }}" data-id="{{ $pasien->id }}">
                        Pilih
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>