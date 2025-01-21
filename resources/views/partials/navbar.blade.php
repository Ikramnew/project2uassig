<header id="header" class="header d-flex align-items-center ">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <h1 class="sitename text-white fw-bold">TheMap</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li class="dropdown">
          <a href="#"><span>Peta Tematik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{url('/populasi')}}">Populasi</a></li>
            <li><a href="{{url('/industri')}}">Ekonomi</a></li>
            <li><a href="{{url('/bencana')}}">Lingkungan</a></li>
          </ul>
        </li>
        <li><a href="{{ route('kabkota') }}">Kab/Kota</a></li>
        <li><a href="{{ route('provinsi') }}">Provinsi</a></li>
        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn btn-light cta-btn" href="{{url('/admin')}}">Login</a>

  </div>
</header>
