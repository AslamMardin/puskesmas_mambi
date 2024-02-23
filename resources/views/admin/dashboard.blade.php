<!-- resources/views/rekam_medik/index.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Puskesmas 
          
          </div>
          <div class="card-stats-items">
           
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{$data['jumlahPoli']}}</div>
              <div class="card-stats-item-label">Poli</div>
            </div>
             <div class="card-stats-item">
              <div class="card-stats-item-count">{{{$data['jumlahPasien']}}}</div>
              <div class="card-stats-item-label">Pasien</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{$data['jumlahPasien']}}</div>
              <div class="card-stats-item-label">Penyakit</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="bi fas bi-person-raised-hand"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Berobat</h4>
          </div>
          <div class="card-body">
            {{$data['rekamMedik']}}
          </div>
        </div>
      </div>

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
            <table class="table" id="table-rekam-medik">
                <thead>
                <tr>
                    <th>Penyakit</th>
                   
                    <th>Pengidap</th>
                    <th>Aksi</th>
                </tr>
               
                </thead>
                <tbody>
                    @php
                        $daftarPenyakit = [];
                        $daftarPengidap = [];
                    @endphp
                    @foreach($uniquePenyakit as $rekamMedik)
                    @php
                        array_push($daftarPenyakit, $rekamMedik->penyakit->nama_penyakit);
                        array_push($daftarPengidap, $jumlahPasienPerPenyakit[$rekamMedik->penyakit->nama_penyakit]);
                    @endphp
                    <tr>
                        <td>{{$rekamMedik->penyakit->nama_penyakit}}</td>
                        <td>{{ $jumlahPasienPerPenyakit[$rekamMedik->penyakit->nama_penyakit] }}</td>
                        <td>
                            <a href="{{url('/penyakit/show/'. $rekamMedik->penyakit->nama_penyakit)}}" class="btn btn-success">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
    <div class="col-lg-7 col-md-7 col-sm-12">
      {{-- cart --}}
      <div class="card">
        <div class="card-header">
          <h4>{{$tanggalSekarang}}</h4>
          <div class="card-header-action">
           
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="182"></canvas>
        
        </div>
      </div>

      {{-- // --}}
    
    </div>
  </div>



  
@endsection

@push('scripts')
    <script>
      "use strict";

var statistics_chart = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels:  @json($daftarPenyakit) ,
    datasets: [{
      label: 'Statistics',
      data: @json($daftarPengidap),
      borderWidth: 5,
      borderColor: '#6777ef',
      backgroundColor: 'transparent',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 100
        }
      }],
      xAxes: [{
        gridLines: {
          color: '#fbfbfb',
          lineWidth: 2
        }
      }]
    },
  }
});

    </script>
@endpush
