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
        @if (session()->has('penyakitFailed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('penyakitFailed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif

          
        <h2 class="fs-2 text-center">Edit Data Penyakit</h2>
        <div class="card-body ">
            {{-- FORM EDIT --}}
          <form action="/admin/penyakit/{{$penyakit->id}}" method="POST" class="center-form">
            @method('PUT')
            @csrf
            {{-- FORM INPUT --}}
            <div class="form-group">
              <label for="nama">Nama Penyakit</label>
              <input type="text" class="form-control @error('nama_penyakit')
              is-invalid
              @enderror " name="nama_penyakit" id="penyakit" placeholder="Masukkan nama penyakit" value="{{$penyakit->nama_penyakit}}">
              @error('nama_penyakit')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="detail">Detail Penyakit</label>
              <textarea class="form-control @error('detail_penyakit')
              is-invalid
              @enderror" id="detail" rows="5" name="detail_penyakit" placeholder="Masukkan detail penyakit" >{{$penyakit->detail_penyakit}}</textarea>
              @error('detail_penyakit')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pengobatan">Solusi Penyakit</label>
              <textarea class="form-control @error('solusi_penyakit')
              is-invalid
              @enderror" id="pengobatan" name="solusi_penyakit" rows="5" placeholder="Masukkan Solusi penyakit" > {{$penyakit->solusi_penyakit}} </textarea>
              @error('solusi_penyakit')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            {{-- FORM INPUT --}}
            {{-- EDIT --}}
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
            {{-- EDIT --}}
          </form>
          {{-- FORM EDIT --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection