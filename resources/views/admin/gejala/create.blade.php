@extends('admin.layouts.main')
@section('content')
<style>
  .center-form {
    margin: 0 auto;
    max-width: 500px;
  }
</style>
<div class="container">
  <div class="row justify-content-center ">
    <div class="col-md-6">
      <div class="card py-3 mt-5">
        @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
        @if (session()->has('GejalaFailed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('GejalaFailed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
        <h2 class="fs-2 text-center">Input Data Gejala</h2>
        <div class="card-body ">
          <form action="/admin/gejala" method="POST" class="center-form">
            @csrf
            <div class="form-group">
              <label for="kode">ID Gejala</label>
              <input type="text" class="form-control @error('id_gejala')
                is-invalid
              @enderror" name="id_gejala" id="penyakit" placeholder="Masukkan ID Gejala" >
              @error('id_gejala')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama Gejala</label>
              <input type="text" class="form-control @error('nama_gejala')
              is-invalid
              @enderror " name="nama_gejala" id="penyakit" placeholder="Masukkan Nama Gejala" >
              @error('nama_gejala')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection