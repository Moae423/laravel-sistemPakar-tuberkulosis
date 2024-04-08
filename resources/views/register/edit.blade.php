<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .register-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 40px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        margin-top: 50px;
    }
    .tombol:hover {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
    }
</style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h2 class="text-center mb-4">Register</h2>
        @if (session()->has('registerFailed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginFailed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
      {{-- FORM EDIT --}}
        <form action="/register/{{$users->id}}" method="POST">
            @method('PUT')
            @csrf
            {{-- FORM INPUT --}}
            <div class="mb-3">
                <label for="namapasien" class="form-label ">Nama Pasien</label>
                <input type="text" class="form-control @error('namaPasien') 
                is-invalid
            @enderror" id="namapasien" name="namaPasien" value="{{$users->namaPasien}}" >
                @error('namaPasien')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control  @error('email')
                is-invalid
            @enderror" id="email" name="email" value="{{$users->email}}"  >
                @error('email')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control  @error('password')
                is-invalid
            @enderror" id="password" name="password" >
                @error('password')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control @error('umur')
                is-invalid
            @enderror" id="umur" name="umur" value="{{$users->umur}}" >
                @error('umur')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control @error('alamat')
                is-invalid
            @enderror" id="alamat" name="alamat" value="{{$users->alamat}}" >
                @error('alamat')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-center">
            <button type="submit" class="tombol btn btn-primary btn-block w-100 p-3">Register</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
