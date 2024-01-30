<nav class="navbar navbar-expand-lg main-navbar">
    <div class="mr-auto"></div>
    <ul class="navbar-nav navbar-right">
     
     
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Anda aktif</div>
          
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> {{Auth::user()->email}}
          </a>
         
         
          <div class="dropdown-divider"></div>
          <a href="{{route('actionlogout')}}" onclick="return confirm('yakin ingin keluar?')" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>