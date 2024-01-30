<!-- resources/views/rekam_medik/index.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Laporan')

@section('content')
    <div class="card">
        <h4 class="card-header">Laporan</h4>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-6 col-sm-12 ">
                    
                    <form action="/filter-bulan" method="GET">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                @php
                    $namaBulan = \Carbon\Carbon::create(null, $i, 1)->locale('id')->isoFormat('MMMM');
                @endphp
                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ Session::get('selectedMonth') == $i ? 'selected' : '' }}>
                    {{ $namaBulan }}
                </option>
            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Penyakit</th>
                    <th>pengidap</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                    <th>Umur</th>
                </tr>
            </thead>
            <tbody>
               
                @if(isset($data['penyakit']))
        @foreach($data['penyakit'] as $key => $penyakit)
            <tr>
                <td>{{ $penyakit }}</td>
                <td>{{ $data['pengidap'][$key] }}</td>

                {{-- Pemeriksaan eksistensi sebelum mengakses kunci --}}
                @if (isset($data['detail'][$key]))
                    <td>{{ $data['detail'][$key]['jumlahLaki'] ?? '' }}</td>
                    <td>{{ $data['detail'][$key]['jumlahPerempuan'] ?? '' }}</td>
                    <td>{{ $data['detail'][$key]['umur_minimum'] ?? '' }} - {{ $data['detail'][$key]['umur_maksimum'] ?? '' }}</td>
                @else
                    {{-- Tindakan yang sesuai jika kunci tidak ditemukan --}}
                    <td colspan="3">Data tidak tersedia</td>
                @endif
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5">Data penyakit tidak tersedia untuk bulan ini</td>
        </tr>
    @endif
            </tbody>
        </table>

        </div>
    </div>
@endsection
