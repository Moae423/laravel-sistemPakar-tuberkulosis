@extends('layouts.main')
@section('content')
<style>
    .form-check-input-shadow {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
    }
  </style>
<div class="container">
    <div class="d-flex justify-content-center min-vh-100 align-items-center">
    <div class="card form-check-input-shadow border-0 p-5">
      <div class="card-header border-0">
        <h1 class="card-title">Form Konsultasi Pasien</h1>
      </div>
      <div class="card-body ">
        <form action="/konsultasi" method="POST">
          @csrf
          <h3>Apa yang anda rasakan?</h3>
          @foreach ($gejalas as $gejala)
          <div class="form-check ">
            <input class="form-check-input" name="gejala[]" type="checkbox" value="{{ $gejala->id }}">{{ $gejala->nama_gejala }}
          </div>
          @endforeach
          <button type="submit" class="btn btn-primary mt-3">Kirim</button>
        </form>
      </div>
    </div>
    </div>
  </div>
@endsection