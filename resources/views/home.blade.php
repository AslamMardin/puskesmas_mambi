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
           /* body {
       background: url('assets/img/bg/pngtree-international-pink-nurse-festival-background-picture-image_1426716.jpg');
       background-size: cover;
       background-position: center center
        } */

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

      <nav class="navbar" style="background-color: #ff2975; color:#fff">
        <div class="container-fluid">
          <a class="navbar-brand">SISTEM INFORMASI TREND PENYAKIT</a>
          <form class="d-flex" role="search">
            <a href="{{route('login')}}" class="btn btn-dark">Login</a>
          </form>
        </div>
      </nav>
     
        
<div class="container-fluid p-3">
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/img/bg/1.jpg') }}" class="d-block w-100" alt="Slide 1" style="height: 500px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/bg/2.jpg') }}" class="d-block w-100" alt="Slide 2" style="height: 500px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/bg/3.jpeg') }}" class="d-block w-100" alt="Slide 3" style="height: 500px;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/img/bg/4.jpeg') }}" class="d-block w-100" alt="Slide 4" style="height: 500px;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



  <div class="row">
    
    <div class="col-12 text-center mt-3  p-3 mb-5" style="background-color: rgb(161, 17, 70); color:#fff">
        <p>Sistem Informasi Trend Penyakit di Puskesmas Mambi adalah platform inovatif yang dirancang untuk memantau, menganalisis, dan melaporkan pola penyakit di wilayah tersebut. Sistem ini memungkinkan tenaga medis dan administrasi untuk mengidentifikasi tren penyakit secara cepat dan akurat, sehingga dapat mengambil langkah preventif dan responsif yang tepat. Dengan integrasi data real-time dan visualisasi yang intuitif, sistem ini membantu meningkatkan kualitas pelayanan kesehatan dan mempercepat pengambilan keputusan dalam penanganan kesehatan masyarakat.</p>
    </div>
</div>


  <div class="card shadow-md">
    <div class="card-body">
          <div class="row">

      
        <div class="col-lg-5 col-md-5 col-sm-12">
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
        
        <div class="col-lg-7 col-md-7 col-sm-12">
          {{-- cart --}}
         
              <h4>{{$tanggalSekarang}}</h4>
              <canvas id="myChart" height="182"></canvas>
            
      
          {{-- // --}}
        
        </div>

      </div>
      </div>
    </div>
    
    
    
      
    

</div>


       </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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