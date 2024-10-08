<style>
  .hidden-nav {
      transform: translateY(-100%);
      transition: transform 0.3s ease;
  }
  <style>
  .navbar-toggler {
    border-color: white; /* Ubah warna border tombol menjadi putih */
  }

  .navbar-toggler-icon {
    background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path stroke="rgba(255, 255, 255, 1)" stroke-width="2" linecap="round" linejoin="round" d="M4 7h22M4 15h22M4 23h22"/></svg>');
    /* Mengubah ikon navbar menjadi putih */
  }
</style>
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand nav-link  fw-bolder  fs-4" href="/">SISTEM PAKAR TUBERKULOSIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link fw-bolder fs-4 " aria-current="page" href="/">Beranda</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link  fs-4" href="/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item">
          <a class="nav-link  fs-5" href="{{ route('konsultasi.riwayat') }}">Riwayat Konsultasi</a>
        </li>
          <li class="nav-item ">
            <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link fs-4  ">Sign Out</button>
            </form>
          </li>
          
          @else
          <li class="nav-item">
            <a href="/login" class=" fs-4 nav-link">Sign In</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>