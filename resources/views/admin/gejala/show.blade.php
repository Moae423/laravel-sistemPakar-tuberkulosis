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
          <th scope="col">Kode Gejala</th>
          <th scope="col">Nama Gejala</th>\
          <th colspan="2" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @php
            $no=1;
        @endphp
        @foreach ($gejala as $g)
        <center>
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $g->kode_gejala }}</td>
          <td>{{ $g->nama_gejala }}</td>
          <td>
            <a href="#" class="btn btn-primary">
              <i class="fas fa-edit"></i> 
           </a>
          </td>
          <td>
            <form action="/admin/gejala/{{$g->id}}" method="POST">
              @method('delete')
              @csrf
              <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Data Gejala Mau Dihapus')"><i class="fas fa-trash-alt"></i> </button>
            </form>
          </td>

        </tr>
      </center>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection