<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem informasi pu8skesmas trend penyakit </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
           body {
       background: url('assets/img/bg/pngtree-international-pink-nurse-festival-background-picture-image_1426716.jpg');
       background-size: cover;
       background-position: center center
        }

        .marquee {
    overflow: hidden;
    white-space: nowrap;
    color: red;
    background-color: black;
    font-size: 45px;
}

.marquee p {
    display: inline-block;
    padding-left: 100%;
    animation: marquee 15s linear infinite;
}

@keyframes marquee {
    0% { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
}

.bottom-right {
    position: fixed;
    bottom: 10px;
    right: 10px;
    margin: 10px;
    
}
.bottom-right a {
    color: white !important;
}
        </style>
    </head>
    <body class="antialiased">
     
        {{-- mulai --}}
        <div class="row my-1">
            <div class="col-12">
                <marquee behavior="scroll" direction="left" style="font-size: 45px; color: red; background-color: yellow;">
                    SELAMAT DATANG DI PUSKESMAS MAMBI MAMASA!!
                </marquee>
            </div>
        </div>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
         
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
                        <th>Alias</th>
                       
                        <th>Pengidap</th>
                    </tr>
                   
                    </thead>
                    <tbody>
                        @php
                            $daftarPenyakit = [];
                            $daftarPengidap = [];
                        @endphp
                        @foreach($uniquePenyakitSorted  as $rekamMedik)
                        @php
                            if($rekamMedik->penyakit->keterangan != ""){
                                array_push($daftarPenyakit, $rekamMedik->penyakit->keterangan);
                            }else {
                                array_push($daftarPenyakit, $rekamMedik->penyakit->nama_penyakit);

                            }
                            array_push($daftarPengidap, $jumlahPasienPerPenyakit[$rekamMedik->penyakit->nama_penyakit]);
                        @endphp
                        <tr>
                            @if($rekamMedik->penyakit->keterangan != "")
                            <td>{{$rekamMedik->penyakit->keterangan}}</td>
                            @else
                            <td>{{$rekamMedik->penyakit->nama_penyakit}}</td>
                            @endif
                            <td>{{$rekamMedik->penyakit->nama_penyakit}}</td>
                            <td>{{ $jumlahPasienPerPenyakit[$rekamMedik->penyakit->nama_penyakit] }}</td>
                            
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
    
    
    
      
    

</div>

<p class="bottom-right"><a href="{{route('login')}}">Login</a></p>
       </body>
</html>
<script src="{{asset('assets/modules/chart.min.js')}}"></script>
<script>
    "use strict";
console.log(@json($daftarPenyakit))
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
       
        suggestedMin: 0,
      suggestedMax: Math.max(...@json($daftarPengidap)), // Menggunakan nilai maksimum dari data
      // stepSize: 100 // Langkah antara setiap label
      }
    }],
    xAxes: [{
      gridLines: {
        color: '#fbfbfb',
        lineWidth: 2
      },
      ticks: {
      autoSkip: false,
      maxRotation: 90,
      minRotation: 0
    }
    }]
  },
}
});

  </script>