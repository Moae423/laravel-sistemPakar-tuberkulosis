@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .register-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 50px;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
        margin-top: 50px;
    }
    .tombol:hover {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
    }
</style>
</head>
<body>
    {{-- <div class="background-image">
        <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;"> --}}
<div class="container">
    <div class="row justify-content-center">
    <div class="register-container">
        @if (session()->has('registerFailed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginFailed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <h2 class="text-center mb-4 fs-1" >Pendaftaran</h2>
      @endif
        <form action="/daftar" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fs-4" >Nama</label>
                <input type="text" class="form-control @error('nama')
                is-invalid
            @enderror" id="nama" name="nama" >
                @error('nama')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-4" >Email address</label>
                <input type="email" class="form-control  @error('email')
                is-invalid
            @enderror" id="email" name="email" >
                @error('email')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-4" >Password</label>
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
                <label for="umur" class="form-label fs-4" >Umur</label>
                <input type="number"  class="form-control  @error('umur') 
                is-invalid
            @enderror" id="umur" name="umur" value="old('email')" >
                @error('umur') 
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label fs-4" >Alamat</label>
                <textarea class="form-control @error('alamat')
                is-invalid
            @enderror" id="alamat" name="alamat" rows="3" ></textarea>
                @error('alamat')
                <div class="invalid-tooltip">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fs-4">User Type</label><br>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="userType" value="admin" {{ old('userType') == 'admin' ? 'checked' : '' }}>
                        Admin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="userType" value="pasien" {{ old('userType') == 'pasien' ? 'checked' : '' }}>
                        Pasien
                    </label>
                </div>
                @error('userType')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-center">
            <button type="submit" class="tombol btn btn-primary fs-3 fw-bold btn-block w-100 p-3">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
{{-- <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
