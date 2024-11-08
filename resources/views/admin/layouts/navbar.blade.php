  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      @auth
      <li class="nav-item d-none d-sm-inline-block  border-opacity-10">
        <form action="/logout" method="POST">
          @csrf
          <input type="submit" class="nav-link text-dark" value="Sign Out">
      </form>
      </li>
      @else
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout" class="nav-link border-start disabled ">Sign Out</a>
      </li>
      @endauth
    </ul>
  </nav>
  <!-- /.navbar -->