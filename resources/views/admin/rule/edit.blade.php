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
        @if (session()->has('RuleFailed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('GejalaFailed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif
        <h2 class="fs-2 text-center">Edit Data Rule</h2>
        <div class="card-body ">
          <form action="/admin/rule/{{$rules->id}}" method="POST" class="center-form">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="kode_penyakit">Penyakit:</label>
                <select name="kode_penyakit" id="kode_penyakit" class="form-control">
                    @foreach ($penyakit as $penyakit_s)
                    <option value="{{ $penyakit_s->kode_penyakit }}">{{ $penyakit_s->kode_penyakit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kode_gejala">Gejala:</label>
                <select name="kode_gejala" id="kode_gejala" class="form-control" >
                    @foreach ($gejala as $gejala_s)
                    <option value="{{ $gejala_s->kode_gejala }}">{{ $gejala_s->kode_gejala }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_probabilitas">Nilai Probabilitas</label>
            <input type="text" name="nilai_probabilitas" id="nilai_probabilitas" class="form-control" value="{{$rules->nilai_probabilitas}}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection