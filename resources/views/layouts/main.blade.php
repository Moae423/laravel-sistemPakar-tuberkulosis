<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman | {{$title}} </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @vite([])
  <body>
    
    @include('partials.navbar')
    <div class="container">
        @yield('content')
    </div>
  </body>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>