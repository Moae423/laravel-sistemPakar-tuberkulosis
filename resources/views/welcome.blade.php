@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')

@if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
        <div class="container" >
            <div class="d-flex justify-content-center min-vh-100 align-items-center flex-column">
                @auth
                <h1 class="p-5 fw-medium  text-center" style="color: #E1E48C">SELAMAT DATANG {{ auth()->user()->namaPasien }} DI APLIKASI SISTEM PAKAR TUBERKULOSIS PUSKESMAS PADANG LUAR</h1>
                @else
                <h1 class="p-5 fw-medium  text-center" style="color: #E1E48C">SELAMAT DATANG DI APLIKASI SISTEM PAKAR TUBERKULOSIS PUSKESMAS PADANG LUAR</h1>
                @endauth
                    <div class="text-center d-flex gap-2"> <!-- Added a new div for centering the button -->
                        @auth
                        <a href="/konsultasi">
                            <button class="btn fw-semibold fs-4  p-3" style="background-color: #427676; color: #A1CD73">Konsultasi</button>
                        </a>
                        @endauth
                        <a href="#">
                            <button class="btn fw-bolder fs-4  p-3" style="background-color: #427676; color: #A1CD73;">Info Penyakit</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection