<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bolder text-white" href="#">SISTEM PAKAR TUBERKULOSIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link  text-white {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Pakar</a>
          </li>
          
          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-white" href="#">Riwayat Konsultasi</a>
        </li>
          <li class="nav-item ">
            <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link  text-white ">Sign Out</button>
            </form>
          </li>
          
          @else
          <li class="nav-item">
            <a href="/login" class="text-white nav-link">Sign In</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>