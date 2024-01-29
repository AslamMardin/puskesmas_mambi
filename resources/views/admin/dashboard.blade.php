<!-- resources/views/rekam_medik/index.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Dashboard')

@section('content')
   <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Penyakit Terbanyak</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
        {{$jumlahPerempuan}}
                    <table class="table" id="table-rekam-medik">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Penyakit</th>
                            <th colspan="2">Jenis Kelamin</th>
                            <th>Pengidap</th>
                        </tr>
                        <tr style="background-color: red">
                            <td colspan="2">-</td>
                            <td>Laki</td>
                            <td>Perempuan</td>
                            <td colspan="3">-</td>
                        </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($uniquePenyakit as $rekamMedik)
                       
                            <tr>
                                <td>{{$rekamMedik->penyakit->id}}</td>
                                
                                <td>{{$rekamMedik->penyakit->nama_penyakit}}</td>
                                @foreach($jumlahLakiLaki as $data)
                                @if($data['penyakit_id'] == $rekamMedik->penyakit->id)
                                <td>{{$data['total']}}</td>
                          
                                @endif
                                @endforeach
                                
                                @foreach($jumlahPerempuan as $data)
                                @if($data['penyakit_id'] == $rekamMedik->penyakit->id)
                                <td>{{ $data['total'] }}</td>
                               
                                @endif
                                @endforeach
                            
                                    <td>{{ $jumlahPasienPerPenyakit[$rekamMedik->penyakit->nama_penyakit] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   </div>
@endsection
