@extends('layouts.main')
@section('content')
<div class="container  ">
    <div class="d-flex justify-content-center min-vh-100 align-items-center flex-column">
        <h1 class="p-5 fw-medium  text-center">SELAMAT DATANG DI APLIKASI SISTEM PAKAR TUBERKULOSIS PUSKESMAS PADANG LUAR</h1>
        <div class="text-center"> <!-- Added a new div for centering the button -->
            <a href="/login">
                <button class="btn fw-normal btn-primary p-3">KONSULTASI</button>
            </a>
        </div>
    </div>
</div>
@endsection