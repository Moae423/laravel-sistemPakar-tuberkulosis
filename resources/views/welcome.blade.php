@extends('layouts.main')
@section('content')
@if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
<div class="container  ">
    <div class="d-flex justify-content-center min-vh-100 align-items-center flex-column">
        @auth
        <h1 class="p-5 fw-medium  text-center">SELAMAT DATANG {{ auth()->user()->namaPasien }} DI APLIKASI SISTEM PAKAR TUBERKULOSIS PUSKESMAS PADANG LUAR</h1>
        @else
        <h1 class="p-5 fw-medium  text-center">SELAMAT DATANG DI APLIKASI SISTEM PAKAR TUBERKULOSIS PUSKESMAS PADANG LUAR</h1>
        @endauth
        <div class="text-center d-flex gap-2"> <!-- Added a new div for centering the button -->
            @auth
            <a href="/konsultasi">
                <button class="btn fw-normal btn-primary p-3">Konsultasi</button>
            </a>
            @endauth
            <a href="#">
                <button class="btn fw-normal btn-primary p-3">Info Penyakit</button>
            </a>
        </div>
    </div>
</div>
@endsection