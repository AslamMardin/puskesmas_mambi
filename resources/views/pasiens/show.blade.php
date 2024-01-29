<!-- resources/views/pasien/show.blade.php -->
@extends('layouts.admin.main')
@section('title', 'Data Pasien Lengkap')
    
@section('content')
   


    <div class="col-12 col-sm-12 col-lg-5 mt-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">                     
            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Pasien</div>
                <div class="profile-widget-item-value">Aktif</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Umur</div>
                <div class="profile-widget-item-value">{{ $pasien->umur }}</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">JK</div>
                <div class="profile-widget-item-value">{{ $pasien->jk == 'Perempuan' ? 'P' : 'L' }}</div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description pb-0">
            <div class="profile-widget-name">{{ $pasien->nama }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $pasien->no_hp }}</div></div>
            <p>Alamat :{{ $pasien->alamat }}.</p>
          </div>
          <div class="card-footer text-center pt-0">
            <div class="font-weight-bold mb-2 text-small">TTl : {{ $pasien->ttl }}</div>
            <a href="{{ route('pasien.index') }}" class="btn btn-primary">Kembali</a>
           
          </div>
        </div>
        
      </div>
@endsection
