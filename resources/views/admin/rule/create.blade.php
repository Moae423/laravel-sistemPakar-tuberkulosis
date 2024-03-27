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
        <h2 class="fs-2 text-center">Input Data Rule</h2>
        <div class="card-body ">
          <form action="/admin/rule" method="POST" class="center-form">
            @csrf
            <div class="form-group">
                <label for="nama_penyakit">Penyakit:</label>
                <select name="nama_penyakit" id="nama_penyakit" class="form-control">
                    @foreach ($penyakit as $penyakit_s)
                        <option value="{{ $penyakit_s->nama_penyakit }}">{{ $penyakit_s->nama_penyakit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_gejala">Gejala:</label>
                <select name="nama_gejala" id="nama_gejala" class="form-control" >
                    @foreach ($gejala as $gejala_s)
                        <option value="{{ $gejala_s->nama_gejala }}">{{ $gejala_s->nama_gejala }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_probabilitas">Nilai Probabilitas</label>
            <input type="text" name="nilai_probabilitas" id="nilai_probabilitas" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection