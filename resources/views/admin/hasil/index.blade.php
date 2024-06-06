@extends('admin.layouts.main')
@section('content')
<div class="container pt-3">
    <h2 class="text-center">Laporan Hasil Diagnosa</h2>
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <center>
    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Kode Hasil</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Nama Penyakit</th>
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @php
        $no=1;
    @endphp
    {{-- @foreach ($gejala as $g) --}}
    
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>test</td>
      <td>test</td>
      <td>test</td>
      <td>
        <a href="#" class="btn btn-primary">
          <i class="fas fa-edit"></i> 
       </a>
      </td>
      <td>
        <form action="#" method="POST">
          @method('delete')
          @csrf
          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Gejala Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
        </form>
      </td>

    </tr>
    {{-- @endforeach --}}
      </tbody>
    </table>
  </center>
  </div>
@endsection