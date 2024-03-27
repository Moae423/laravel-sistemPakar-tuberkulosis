@extends('admin.layouts.main')
@section('content')
<div class="container pt-3">
    <h2 class="text-center">Daftar Gejala</h2>
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Nama Penyakit</th>
          <th scope="col">Nama Gejala</th>
          <th scope="col">Nilai Probabilitas</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @php
            $no=1;
        @endphp
        @foreach ($rules as $rule)
        <center>
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $rule->nama_penyakit }}</td>
          <td>{{ $rule->nama_gejala }}</td>
          <td>{{ $rule->nilai_probabilitas }}</td>
          <td>
            <a href="#" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <a href="#" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
              <i class="fas fa-trash-alt"></i> 
            </a>
          </td>

        </tr>
      </center>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection