<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman | {{$title}} </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  <body>
    
    @include('partials.navbar')
    <div class="container">
        @yield('content')
    </div>
  </body>
  <script src="js/bootstrap.bundle.min.js"></script>
</html>