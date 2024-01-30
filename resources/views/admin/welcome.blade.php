<!-- resources/views/rekam_medik/index.blade.php -->
@extends('layouts.admin.main')

@section('title', 'Puskesmas Mambi')

@section('content')
<h2 class="section-title">Pelayanan Puskesmas Mambi</h2>
<div class="row">
    <div class="col-lg-6 col-sm-12 mb-3">
      <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('/assets/img/bg/puskesmas.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="hero-inner">
          <h2>Selamat Datang!</h2>
          <p class="lead">Di Puskesmas Mambi Kab. Mamasa</p>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="activities">
        <div class="activity">
          <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fas bi bi-123"></i>
          </div>
          <div class="activity-detail">
            <div class="mb-2">
              <span class="text-job">1. Mengambil No Antrian</span>
              <p>Pengunjung mengambil no antrian yang sudah disediakan</p>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fas bi bi-hourglass-split"></i>
          </div>
          <div class="activity-detail">
            <div class="mb-2">
              <span class="text-job">2. Menunggu</span>
              <p>pasien menunggu untuk dipanggil namanya</p>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fas bi bi-thermometer-half"></i>
          </div>
          <div class="activity-detail">
            <div class="mb-2">
              <span class="text-job">3. Diperiksa</span>
              <p>pasien dipanggil akan diperiksa oleh dokter</p>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fas bi bi-clipboard-pulse"></i>
          </div>
          <div class="activity-detail">
            <div class="mb-2">
              <span class="text-job">4. Diberi Resep</span>
              <p>setelah diperiksa akan diberikan resep</p>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fas bi bi-capsule"></i>
          </div>
          <div class="activity-detail">
            <div class="mb-2">
              <span class="text-job">5. Dikasi Obat</span>
             <p>pasien menunggu lagi untuk dipanggil kemudian diberikan obat sesuai resep dokter</p>
             
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </div>
@endsection
