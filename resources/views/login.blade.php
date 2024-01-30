<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PUSKESMAS MAMBI</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
<!-- Start GA -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> --}}

</head>
<style>
    body {
       background: url('assets/img/bg/pngtree-international-pink-nurse-festival-background-picture-image_1426716.jpg');
       background-size: cover;
       background-position: center center
        }
</style>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- ... Bagian Header Card ... -->

            <div class="card card-primary">
              <div class="card-header text-center">
                <h4><b>Login</b><br>Sistem Informasi Trend Penyakit pada Puskesmas Mambi</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" >
                  @csrf
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" onfocus>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                @if(session('error'))
                  <div class="alert alert-danger my-2" role="alert">
                    {{ session('error') }}
                  </div>
                @endif
                @if($errors->any())
                  <div class="alert alert-danger my-2" role="alert">
                    Login Gagal. Silakan coba lagi.
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>